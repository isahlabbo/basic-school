<?php

namespace App\Http\Livewire\Admission;

use Livewire\Component;
use App\Models\Section;

class SectionClass extends Component
{
    
    public $sections;
    
    public function render()
    {
        return view('livewire.admission.section-class');
    }

    
}
