<?php

use Illuminate\Support\Facades\Route;
use App\Models\Section;
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
Route::prefix('ajax')
   ->group(function() {
    Route::get('/section/{sectionId}/get-classes', 'AjaxController@getSectionClasses');
});


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard',['sections'=>Section::all()]);
})->name('dashboard');


Route::name('dashboard.')
->prefix('dashboard')
->middleware(['auth:sanctum', 'verified'])
->group(function (){
    // school section routes
    Route::namespace('Section')
    ->name('section.')
    ->prefix('/section')
    ->group(function (){
        Route::get('/{sectionId}', 'SectionController@index')->name('index');
        // section class teacers routes
        Route::name('class-teacher.')
        ->prefix('{sectionClassId}/class-teacher')
        ->group(function (){
            Route::get('create/', 'ClassTeacherController@create')->name('create');
            Route::get('re-create/', 'ClassTeacherController@reCreate')->name('reCreate');
            Route::post('register/', 'ClassTeacherController@register')->name('register');
        });
    });

    // teachers routes
    Route::namespace('School')
    ->name('teacher.')
    ->prefix('/teacher')
    ->group(function (){
        Route::get('/', 'TeacherController@index')->name('index');
        Route::get('/create', 'TeacherController@create')->name('create');
        Route::post('/register', 'TeacherController@register')->name('register');
    });
    
    // student routes
    Route::namespace('School')
    ->name('student.')
    ->prefix('/student')
    ->group(function (){
        Route::get('/', 'StudentController@index')->name('index');
        Route::get('/create', 'StudentController@create')->name('create');
        Route::post('/register', 'StudentController@register')->name('register');
    });
});
