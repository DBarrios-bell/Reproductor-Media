<?php

namespace App\Http\Livewire;

use App\Models\Specialty;
use Livewire\Component;
use Livewire\WithPagination;

class Specialities extends Component
{

    use WithPagination;
    public $nombre, $search, $selected_id, $pageTitle, $componentName, $session;
    private $pagination = 10;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Especialidades';
        // $this->session = session();
    }

    public function render()
    {
        if (strlen($this->search) > 0)
            $specialty = Specialty::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        else
            $specialty = Specialty::paginate($this->pagination);
        return view('livewire.specialty.component',[
            'specialties' => $specialty
        ])->extends('layouts.app');
    }
}
