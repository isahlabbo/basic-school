<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $guarded = [];

    public function currentSession()
    {
        return AcademicSession::where('status','Active')->first();
    }

    public function currentSessionTerm()
    {
        
        return $this->currentSession()->academicSessionTerms->where('status','Active')->first();
    }

}
