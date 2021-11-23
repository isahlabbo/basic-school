<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends BaseModel
{
    public function termSubjectResults()
    {
        return $this->hasMany(TermSubjectResult::class);
    }
}
