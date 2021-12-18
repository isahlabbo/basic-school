<?php

use App\Models\AcademicSession;

if (!function_exists('currentAcademicSession')) {
    function currentAcademicSession($url)
    {
        return AcademicSession::where('status','Active')->first();
    }
}

if (!function_exists('currentAcademicSessionTerm')) {
    function currentAcademicSessionTerm($url)
    {
        foreach (currentAcademicSession()->academicSesstionTerms as $academicSessionTerm) {
            if(strtotime($academicSessionTerm->end) > time()){
                return $academicSessionTerm;
            }
        }
        return null;
        
    }
}