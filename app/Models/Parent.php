<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parent extends BaseModel
{
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
