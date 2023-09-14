<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::get('/home', function () {
    return "<h1>Ini Home!</h1>";
});

// Route::get('/about', function () {
//     echo "<h1 style='text-align: center'><u>Tentang saya</u></h1>";
//     echo "<p>Ini website aku. <i>Never stop learning</i>. <strong>Jangan lupa tidur</strong>.</p>";
// });

// $data='Lorem Ipsum';

// Route::view('/about', 'about', compact('data'));

Route::get('/about', function (){
    $title = 'About Us';
    $description = 'Blogging is website for sharing your thoughts and ideas with the world';
    $button = '<a class="btn btn-lg btn-secondary" href="/">Back to Landing Page</a>';
    return view ('about', compact('title', 'description', 'button'));
});