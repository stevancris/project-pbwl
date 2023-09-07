FROM alpine:3.13.5
LABEL Maintainer="Cristian Stevanus <cristianstevanus09@gmail.com>"

RUN adduser -D -H -u 1000 -s /bin/bash www-data && \
    mkdir -p /www && \
    chown -R www-data:www-data /www

RUN apk --no-cache add openssl-dev php8 php8-fpm php8-opcache php8-mysqli php8-json php8-openssl php8-curl \
    php8-zlib php8-xml php8-phar php8-intl php8-dom php8-xmlreader php8-ctype php8-session php8-xmlwriter php8-pdo php8-pcntl php8-posix php8-tokenizer \
    php8-mbstring php8-gd nginx supervisor curl php8-pdo_mysql php8-zip php8-fileinfo php8-iconv php8-simplexml php-zip php8-dev php8-pear && \
    rm /etc/nginx/conf.d/default.conf

#RUN pecl install mongodb && pecl config-set php_ini /etc/php8/conf.d/php.ini && echo "extension=mongodb.so" > /etc/php8/conf.d/20_mongodb.ini && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer 

COPY ../infrastructure/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ../infrastructure/php/php-fpm.conf /etc/php8/php-fpm.d/www.conf
COPY ../infrastructure/php/php.ini /etc/php8/php.ini

COPY supervisord/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN mkdir -p /var/www/html
WORKDIR /var/www/html
COPY . /var/www/html/
RUN cd /var/www/html && composer install && chmod -R 777 storage

EXPOSE 8000

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
