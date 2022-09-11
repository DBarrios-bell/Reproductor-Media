<?php

namespace App\Http\Livewire;

use App\Models\Specialty;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.navbar.navbar',[
        ]);
    }
}
