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
    Route::get('/section/class/{sectionClassId}/get-subjects', 'AjaxController@getClassSubjects');
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
        Route::name('class.')
        ->prefix('/class')
        ->group(function (){
            Route::get('/{sectionClassId}', 'SectionClassController@index')->name('index');
            Route::name('subject.')
            ->prefix('/{classId}/subject')
            ->group(function (){
                Route::get('/', 'SubjectController@index')->name('index');
            });

            // subject results routes
            Route::name('student.result.')
                ->prefix('/student/result')
                ->group(function (){
                    Route::get('/{studentId}/view', 'StudentResultController@view')->name('view');
            });
            // subject results routes
            Route::name('subject.result.')
                ->prefix('/subject/result')
                ->group(function (){
                    Route::get('/', 'SubjectResultController@index')->name('index');
                    Route::post('/check-result', 'SubjectResultController@checkResult')->name('check');
                    Route::get('/{sectionClassSubjectId}/summary', 'SubjectResultController@viewResultSummary')->name('summary');
                    Route::get('/summary/{subjectTeacherUploadId}/detail', 'SubjectResultController@viewDetail')->name('summary.detail');
                    Route::get('/summary/detail/{studentResultId}/edit', 'SubjectResultController@editResult')->name('summary.detail.edit');
                    Route::post('/summary/detail/{studentResultId}/update', 'SubjectResultController@updateResult')->name('summary.detail.update');
            });
            Route::name('subject.allocation.')
                ->prefix('/subject/teacher/{teacherId}/allocations')
                ->group(function (){
                    Route::get('/', 'SubjectTeacherAllocationController@index')->name('index');
            });

            Route::name('subject.allocation.')
                ->prefix('/subject/{sectionClassSubjectId}/allocation')
                ->group(function (){
                    Route::get('/create', 'SubjectTeacherAllocationController@create')->name('create');
                    Route::get('/re-create', 'SubjectTeacherAllocationController@reCreate')->name('reCreate');
                    Route::post('/regidter', 'SubjectTeacherAllocationController@register')->name('register');
            });
        }); 
    });

    // teachers routes
    Route::namespace('School')
    ->name('teacher.')
    ->prefix('/teacher')
    ->group(function (){
        // score sheet route
        Route::get('/{sectionClassSubjecTeacherId}/download-score', 'ScoreSheetController@download')
        ->name('download.scoresheet');

        Route::get('/{sectionClassSubjecId}/upload-score', 'ScoreSheetController@upload')
        ->name('upload.scoresheet');

        Route::post('/{sectionClassSubjecId}/upload-now', 'ScoreSheetController@uploadNow')
        ->name('scoresheet.uploadNow');


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
