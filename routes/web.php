<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('/')->group(function () {
    Route::get('/', function () {
        $data = new ContactController();

        return view('home', ['data' => $data->showAll()]);
        //return view('home', ['data' => '$data->showAll()']);
    });

    Route::get('/contact/{id}', function ($id) {
        $data = new ContactController();

        return view('contact', ['data' => $data->showOne($id)]);
    });

    Route::get('/new', function () {
        return view('store');
    });

    Route::get('/contact/{id}/update', function ($id) {
        $data = new ContactController();

        return view('update', ['data' => $data->showOne($id)]);
    });

    Route::get('/contact/{id}/delete', function ($id) {
        $data = new ContactController();

        return view('delete', ['data' => $data->showOne($id)]);
    });
 });


 Route::post('/store', [ContactController::class, 'store']);
 Route::post('/update/{id}', [ContactController::class, 'update']);
 Route::post('/delete/{id}', [ContactController::class, 'delete']);