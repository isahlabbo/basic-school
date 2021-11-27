<?php

use App\Models\AcademicSession;

if (!function_exists('currentSession')) {
    function currentSession($url)
    {
        return AcademicSession::where('status','Active')->first();
    }
}