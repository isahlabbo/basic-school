<?php

namespace App\Models;


class SectionClassPayment extends BaseModel
{
    public function sectionClass()
    {
        return $this->belongsTo(SectionClass::class);
    }

    public function term()
    {
        return $this->belongsTo(Term::class);
    }

    public function gender(Type $var = null)
    {
        switch ($this->gender) {
            case '1':
                $gender = 'Male';
                break;
            case '2':
                $gender = 'Female';
                break;
            default:
            $gender = 'Both';
                break;
        }
        return $gender;
    }
}
