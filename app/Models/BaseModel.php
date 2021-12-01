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
            $count = 1;
            foreach($this->currentSession()->academicSessionTerms as $academicSessionTerm){
                if($count == 1){
                    $academicSessionTerm->update(['status'=>'Active']);
                    $count++;
                }
            }
        }
        return AcademicSessionTerm::where('status','Active')->first();
    }

}
