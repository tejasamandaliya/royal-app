<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Middleware\checkAuthToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('/', function () {
    return view('welcome');
});


Route::post('/login', [AuthController::class, 'Login'])->name('welcome.login');

Route::middleware([checkAuthToken::class])->group(function () {

    Route::get('/authers', [AuthorController::class, 'getAuthors']);

    Route::get('/authers/{id}', [AuthorController::class, 'editAuthor']);

    Route::get('/auther-delete/{id}', [AuthorController::class, 'deleteAuthor']);

    Route::get('/create-book', [BookController::class, 'getCreateBook']);

    Route::post('/create-book', [BookController::class, 'postCreateBook'])->name('create.book');

    Route::get('/books', [BookController::class, 'getBooks']);

    Route::get('/books/{id}', [BookController::class, 'editBook']);

    Route::get('/book-delete/{id}', [BookController::class, 'deleteBook']);

    Route::get('/logout', function (Request $request) {

        \DB::table('royal_app_tokens')->where('token_key', Session::get('auth_token'))->delete();
        $request->session()->forget('auth_token');

        return redirect('/');
    });
});
