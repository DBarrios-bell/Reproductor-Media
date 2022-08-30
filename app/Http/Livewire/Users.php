<?php

namespace App\Http\Livewire;

use App\Models\AttentionPoint;
use App\Models\Specialty;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Users extends Component
{

    use WithFileUploads;
    use WithPagination;

    public $name,$lastname, $identificacion, $email,$patencion_id, $specialty_id, $password, $selected_id,
    $pageTitle, $componentName, $session;
    private $pagination = 2;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Creacon de Usuarios';
        $this->patencion_id = 'Elegir';
        $this->specialty_id='';
    }

    public function render()
    {
        // return view('livewire.users.component',[
        //     'especialidades' => Specialty::latest()->get(),
        //     'pAtencion' => AttentionPoint::latest()->get()
        // ])->extends('layouts.app2');
    }

    public function Edit($id)
    {
        // $edit = User:.find($id,['id','name','apellido','identificacion','email','specialty']);
    }

    public function Store()
    {
        $rules=[
            'name'=> 'required|min:3',
            'lastname'=> 'required|min:8',
            'identificacion'=> 'required|min:7|unique:users',
            'email' => 'required|email|unique:users',
            'password'=>'required'
        ];

        $this->validate($rules);

        // dd($this->patencion_id);
        $user = User::create([
            'name'=> $this->name,
            'lastname'=>$this->lastname,
            'identificacion'=>$this->identificacion,
            'email'=>$this->email,
            'password'=>Hash::make($this->password),
            'specialty_id'=>$this->specialty_id,
            'patencion_id'=>$this->patencion_id
        ]);
        $user->save();

    }
    public function ResetUI()
    {
        $this->name= ' ';
        // $this->specialty_id = 'Elegir';
        // $this->patencion_id = 'Elegir';
    }
}
