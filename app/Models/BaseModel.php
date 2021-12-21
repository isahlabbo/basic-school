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
        if(count($this->currentSession()->academicSessionTerms->where('status','Active')) == 0){
            foreach (currentAcademicSession()->academicSesstionTerms as $academicSessionTerm) {
                if(strtotime($academicSessionTerm->end) > time()){
                    return $academicSessionTerm;
                }
            }
            return null;
        }
        
    }

}
