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
        $data = $data->showAll();

        return view('home', ['data' => $data->original]);
    });

    Route::get('/contact/{id}', function ($id) {
        $data = new ContactController();
        $data = $data->showOne($id);
        
        return view('contact', ['data' => $data->original]);
    });

    Route::get('/new', function () {
        return view('store');
    });

    Route::get('/contact/{id}/update', function ($id) {
        $data = new ContactController();
        $data = $data->showOne($id);

        return view('update', ['data' => $data->original]);
    });

    Route::get('/contact/{id}/delete', function ($id) {
        $data = new ContactController();
        $data = $data->showOne($id);

        return view('delete', ['data' => $data->original]);
    });
 });


Route::post('/store', [ContactController::class, 'store']);
Route::put('/update/{id}', [ContactController::class, 'update']);
Route::delete('/delete/{id}', [ContactController::class, 'delete']);
