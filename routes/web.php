<?php

use Illuminate\Support\Facades\Route;
use App\Models\Teacher;
use App\Models\Section;
use App\Models\Student;
use App\Models\AcademicSession;
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

Route::get('/duplicate', function () {
    $exist = [];
    $count = 0;
    foreach(App\Models\Student::all() as $student){
        if(in_array($student->admission_no, $exist)){
            return $student->admission_no;
        }else{
            $exist[] = $student->admission_no;
        }
    }
    return $count;
});


Route::middleware(['auth:sanctum', 'verified','resumed'])->get('/dashboard', function () {
    return view('dashboard',['students'=>Student::all(),'teachers'=>Teacher::all(),'session'=>AcademicSession::find(1),'sections'=>Section::all()]);
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
        Route::get('/view', 'CommentController@view')->name('view');
        Route::post('/teacher-comment/{teacherCommentId}/update', 'CommentController@updateTeacherComment')->name('teacher.update');
        Route::post('/head-teacher-comment/{headteacherCommentId}/update', 'CommentController@updateHeadTeacherComment')->name('headteacher.update');
        Route::get('/teacher-comment/{teacherCommentId}/delete', 'CommentController@deleteTeacherComment')->name('teacher.delete');
        Route::get('/head-teacher-comment/{headteacherCommentId}/delete', 'CommentController@deleteHeadTeacherComment')->name('headteacher.delete');
    });
    // school section routes
    Route::namespace('Section')
    ->name('section.')
    ->prefix('/section')
    ->group(function (){
        Route::get('/{sectionId}/view', 'SectionController@view')->name('view');
        Route::get('/{sectionId}/delete', 'SectionController@delete')->name('delete');
        Route::post('/register', 'SectionController@register')->name('register');
        Route::post('/{sectionId}/update', 'SectionController@update')->name('update');
        Route::get('/', 'SectionController@index')->name('index');
        // section class teachers routes
        Route::name('class-teacher.')
        ->prefix('{sectionClassId}/class-teacher')
        ->group(function (){
            Route::get('create/', 'ClassTeacherController@create')->name('create');
            Route::get('re-create/', 'ClassTeacherController@reCreate')->name('reCreate');
            Route::post('register/', 'ClassTeacherController@register')->name('register');
        });

        Route::name('result.')
        ->group(function (){
            Route::get('/{sectionId}/result', 'SectionResultController@index')->name('index');
            Route::get('/class/{sectionClassId}/awaiting-result', 'SectionResultController@classAwaitingResult')->name('awaiting');
        });


        Route::namespace('Configuration')
        ->name('configuration.')
        ->prefix('/configuration')
        ->group(function (){
            Route::name('reportcard.')
            ->prefix('/report-card')
            ->group(function (){
                Route::name('psychomotor.')
                ->prefix('/psycomotor')
                ->group(function (){
                    Route::post('/register', 'PsychomotorController@register')->name('register');
                    Route::post('/{psychomotorId}/update', 'PsychomotorController@update')->name('update');
                    Route::get('/{psychomotorId}/delete', 'PsychomotorController@delete')->name('delete');
                });

                Route::name('affectivetrait.')
                ->prefix('/affective-trait')
                ->group(function (){
                    Route::post('/register', 'AffectiveTraitController@register')->name('register');
                    Route::post('/{affectiveTraitId}/update', 'AffectiveTraitController@update')->name('update');
                    Route::get('/{affectiveTraitId}/delete', 'AffectiveTraitController@delete')->name('delete');
                });
               
                Route::name('remark.')
                ->prefix('/remark')
                ->group(function (){
                    Route::post('/register', 'RemarkController@register')->name('register');
                    Route::post('/{remarkId}/update', 'RemarkController@update')->name('update');
                    Route::get('/{remarkId}/delete', 'RemarkController@delete')->name('delete');
                });

                Route::name('grade.')
                ->prefix('/grade')
                ->group(function (){
                    Route::post('/register', 'GradeController@register')->name('register');
                    Route::post('/{gradeId}/update', 'GradeController@update')->name('update');
                    Route::get('/{gradeId}/delete', 'GradeController@delete')->name('delete');
                });

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
                Route::get('/accessment/view', 'ClassResultController@viewAccessment')->name('accessment.view');
                Route::get('/accessment/{studentTermId}/edit', 'ClassResultController@editAccessment')->name('accessment.edit');
                Route::post('/accessment/{studentTermId}/update', 'ClassResultController@updateAccessment')->name('accessment.update');
                Route::post('/accessment/upload', 'ClassResultController@uploadAccessment')->name('accessment.upload');
            });
            
            // exam routes
            Route::name('exam.')
            ->prefix('{classId}/exam')
            ->group(function (){
                Route::get('/', 'ExamController@index')->name('index');

                Route::post('/subject/{questId}/new-item', 'ExamController@newItem')->name('question.newItem');
                Route::post('/subject/{questId}/new-option', 'ExamController@newOption')->name('question.newOption');
                Route::get('/question/item/{itemId}/delete-item', 'ExamController@deleteItem')->name('question.delete.item');
                Route::get('/question/option/{optionId}/delete-option', 'ExamController@deleteOption')->name('question.delete.option');
                Route::get('/{examId}/subjects', 'ExamController@examSubject')->name('subject');
                Route::get('/subject/{subjectId}/question-papers', 'ExamController@subjectQuestionPaper')->name('subject.question.paper');
                Route::post('/register', 'ExamController@register')->name('register');
                
                
                Route::name('subject.')
                ->group(function (){
                    Route::name('question.')
                    ->group(function (){
                        Route::post('/subject/question/register', 'QuestionController@register')->name('register');
                        Route::post('/subject/question/move', 'QuestionController@move')->name('move');
                        Route::post('/subject/question/copy', 'QuestionController@copy')->name('copy');
                        Route::get('/subject/{subjectId}/questions', 'QuestionController@index')->name('index');
                        Route::get('/subject/questions/{questionId}/view', 'QuestionController@view')->name('view');
                        Route::get('/subject/questions/{questionId}/delete', 'QuestionController@delete')->name('delete');
                        Route::post('/subject/questions/{questionId}/update', 'QuestionController@update')->name('update');
                    //    question section route
                        Route::name('section.')
                        ->prefix('/subject/{subjectId}/section')
                        ->group(function (){
                            Route::get('/', 'QuestionSectionController@index')->name('index');
                            Route::post('/register', 'QuestionSectionController@register')->name('register');
                        });
                    });
                });
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
                        Route::get('/summary/{subjectTeacherUploadId}/delete', 'ResultSearchController@deleteUpload')->name('summary.delete');
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
        
        Route::get('/{academicSessionTermId}/resume', 'StudentController@resume')->name('resume');
        Route::get('/{academicSessionTermId}/confirm-resume', 'StudentController@confirmResume')->name('resume.confirm');
        Route::get('/', 'StudentController@index')->name('index');
        Route::post('/search', 'StudentController@search')->name('search');
        Route::get('/{studentId}/profile', 'StudentController@profile')->name('profile');
        Route::get('/create', 'StudentController@create')->name('create');
        Route::get('/student/{studentId}/delete', 'StudentController@delete')->name('delete');
        Route::get('/student/{studentId}/edit', 'StudentController@edit')->name('edit');
        Route::post('/student/{studentId}/update', 'StudentController@update')->name('update');
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
