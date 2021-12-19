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
    Route::namespace('Section')
    ->name('payment.')
    ->prefix('/payment')
    ->group(function (){
        Route::get('/', 'PaymentController@index')->name('index');
        Route::get('/class/{sectionClassId}', 'PaymentController@classStudentPayment')->name('class.index');
        Route::post('/class/student/{sectionClassStudentId}/pay', 'PaymentController@addStudentPayment')->name('class.student.pay');
        Route::post('/search', 'PaymentController@search')->name('search');
        Route::name('class.fee.')
        ->prefix('/class/{classId}/fee')
        ->group(function (){
            Route::get('/', 'ClassFeeController@index')->name('index');
            Route::post('/register', 'ClassFeeController@register')->name('register');
            Route::post('/{feeId}/update', 'ClassFeeController@update')->name('update');
            Route::get('/{feeId}/delete', 'ClassFeeController@delete')->name('delete');
        });
    });
    Route::namespace('Section')
    ->name('comment.')
    ->prefix('/comment')
    ->group(function (){
        Route::get('/', 'CommentController@index')->name('index');
    });
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
        
        Route::namespace('Configuration')
        ->name('configuration.')
        ->prefix('/configuration')
        ->group(function (){
            Route::name('reportcard.')
            ->prefix('/report-card')
            ->group(function (){
                Route::get('/', 'ReportCardConfigurationController@index')->name('index');
            });
        });
        Route::name('class.')
        ->prefix('/class')
        ->group(function (){
            Route::post('/{sectionId}/register', 'SectionClassController@register')->name('register');
            Route::post('/{sectionClassId}/update', 'SectionClassController@updateClass')->name('update');
            Route::get('/{sectionClassId}/delete', 'SectionClassController@deleteClass')->name('delete');
            Route::name('result.')
            ->prefix('/{sectionClassId}/result')
            ->group(function (){
                Route::get('/summary', 'ClassResultController@summary')->name('summary');
                Route::get('/report', 'ClassResultController@report')->name('report');
                Route::get('/accessment/download', 'ClassResultController@downloadAccessment')->name('accessment.download');
                Route::post('/accessment/upload', 'ClassResultController@uploadAccessment')->name('accessment.upload');
            });
            
            Route::get('/{sectionClassId}/student-admission-no', 'SectionClassController@reGenerateAdmissionNo')->name('admission.number.regenerate');
            Route::get('/{sectionClassId}', 'SectionClassController@index')->name('index');
            Route::get('/{sectionClassId}/students', 'SectionClassController@student')->name('student');
            Route::get('/student/{studentId}/delete', 'SectionClassController@delete')->name('student.delete');
            Route::get('/student/{studentId}/edit', 'SectionClassController@edit')->name('student.edit');
            Route::post('/student/{studentId}/update', 'SectionClassController@update')->name('student.update');
            Route::get('/{sectionClassId}/student-template-downlod', 'SectionClassController@downloadTemplate')->name('student.template.download');
            Route::post('/{sectionClassId}/student-template-upload', 'SectionClassController@uploadTemplate')->name('student.template.upload');
            Route::name('subject.')
            ->prefix('/{classId}/subject')
            ->group(function (){
                Route::get('/', 'SubjectController@index')->name('index');
                Route::post('/register', 'SubjectController@register')->name('register');
                Route::post('/{sectionClassSubjectId}/update', 'SubjectController@update')->name('update');
                Route::get('/{sectionClassSubjectId}/delete', 'SubjectController@delete')->name('delete');
                Route::get('/result', 'SubjectController@result')->name('result');
            });

            // subject results routes
            Route::name('student.result.')
                ->prefix('/student/result')
                ->group(function (){
                    Route::get('/{studentId}/view', 'StudentResultController@view')->name('view');
            });
            // subject results routes
            Route::name('subject.')
            ->prefix('/subject')
            ->group(function (){
                Route::name('result.')
                    ->prefix('/result')
                    ->group(function (){
                        Route::get('/', 'ResultSearchController@index')->name('index');
                        Route::post('/check-result', 'ResultSearchController@checkResult')->name('check');
                        Route::get('/{sectionClassSubjectId}/summary', 'ResultSearchController@viewResultSummary')->name('summary');
                        Route::get('/summary/{subjectTeacherUploadId}/detail', 'ResultSearchController@viewDetail')->name('summary.detail');
                        Route::get('/summary/detail/{studentResultId}/edit', 'ResultSearchController@editResult')->name('summary.detail.edit');
                        Route::post('/summary/detail/{studentResultId}/update', 'ResultSearchController@updateResult')->name('summary.detail.update');
                });
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
        Route::post('/{teacherId}/update', 'TeacherController@update')->name('update');
        Route::get('/{teacherId}/delete', 'TeacherController@delete')->name('delete');
    });
    
    // student routes
    Route::namespace('School')
    ->name('student.')
    ->prefix('/student')
    ->group(function (){
        
        Route::get('/', 'StudentController@index')->name('index');
        Route::get('/create', 'StudentController@create')->name('create');
        Route::post('/register', 'StudentController@register')->name('register');
        Route::name('accessment.')
        ->prefix('/accessment')
        ->group(function (){
            Route::get('/{sectionClassId}', 'StudentAccessmentController@index')->name('index');
            Route::get('/{sectionClassStudentId}/create', 'StudentAccessmentController@create')->name('create');
            Route::post('/{sectionClassStudentTermId}/register', 'StudentAccessmentController@register')->name('register');
        });
    });

    Route::namespace('School')
    ->name('session.')
    ->prefix('/academic-session')
    ->group(function (){
        Route::get('/', 'AcademicSessionController@index')->name('index');
        Route::get('/{academicSessionId}/activate', 'AcademicSessionController@saveAsCurrentSession')->name('activate');
        Route::get('/{academicSessionId}/configure', 'AcademicSessionController@configure')->name('configure');
        Route::post('/configuration/update', 'AcademicSessionController@update')->name('configuration.update');
    });
});
