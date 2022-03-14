<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends BaseModel
{
    public function questionType()
    {
        return $this->belongsTo(QuestionType::class);
    }

    public function sectionClassTermlyExam(Type $var = null)
    {
        return $this->belongsTo(SectionClassTermlyExam::class);
    }

    public function sectionClassSubject(Type $var = null)
    {
        return $this->belongsTo(SectionClassSubject::class);
    }


    public function options()
    {
        return $this->hasMany(Option::class);
    }
    
    public function questionItems()
    {
        return $this->hasMany(QuestionItem::class);
    }
}
