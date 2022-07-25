<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemarkType extends BaseModel
{
    public function sectionClasses()
    {
        return $this->hasMany(SectionClass::class);
    }
}
