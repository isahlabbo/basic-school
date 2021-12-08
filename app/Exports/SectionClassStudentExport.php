<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
<<<<<<< HEAD

class SectionClassStudentExport implements FromView
{
=======
use App\Models\SectionClass;

class SectionClassStudentExport implements FromView
{
    protected $sectionClass = null;

    public function __construct(SectionClass $sectionClass)
    {
        $this->sectionClass = $sectionClass;
    }
>>>>>>> effb797dd2c4667d7dec899ed0d8164733225652
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
<<<<<<< HEAD
        return view('section.class.student.template');
=======
        return view('section.class.student.template',['sectionClass'=>$this->sectionClass]);
>>>>>>> effb797dd2c4667d7dec899ed0d8164733225652
    }
}
