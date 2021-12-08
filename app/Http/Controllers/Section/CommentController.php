<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeacherComment;
use App\Models\HeadTeacherComment;

class CommentController extends Controller
{
    public function index()
    {
        return view('section.comment.index',[
            'teacherComments'=>TeacherComment::all(),
            'headTeacherComments'=>HeadTeacherComment::all()
        ]);
    }
}
