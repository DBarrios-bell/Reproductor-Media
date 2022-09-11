<?php

namespace App\Http\Livewire;

use App\Models\AttentionPoint;
use Livewire\Component;

class AttentionPoints extends Component
{
    public $nombre;

    public function render()
    {
        return view('livewire.attention-points')
        ->extends('layouts.app')->section('content');
    }

    public function Store()
    {
        $punto = AttentionPoint::create([
            'regional'=> $this->nombre
        ]);
        $punto->save();
        $this->emit("modal-added",'Punto de Atencion Creado');
    }
}
