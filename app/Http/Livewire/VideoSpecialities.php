<?php

namespace App\Http\Livewire;

use App\Models\Specialty;
use App\Models\Video;
use App\Models\VideoSpecialty;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class VideoSpecialities extends Component
{
    public $video, $especialidad;

    public function render()
    {
        $videoSpecialties = VideoSpecialty::join('videos as v', 'v.id', 'video_specialties.video_id')
            ->join('specialties as s', 's.id', 'video_specialties.specialty_id')
            ->select('video_specialties.id as id','v.id as videoid','v.titulo as video','s.id as especialidadid','s.nombre as especialidad')
            ->orderBY('id', 'asc')->paginate(10);
        $video = Video::all();
        $especialidad = Specialty::all();

        return view('livewire.media-specialty.component', [
            'videoSpecialties' => $videoSpecialties,
            'videos' => $video,
            'specialties' => $especialidad
        ])->extends('layouts.app')->section('content');
    }

    public function Store()
    {
        $rules = [
            'video' => 'required',
            'especialidad' => 'required'
        ];

        $this->validate($rules);

        $validacion = VideoSpecialty::where('video_id', $this->video)
            ->where('specialty_id', $this->especialidad)->count();

        if ($validacion == 0) {
            $videoSpecialty = VideoSpecialty::create([
                'video_id' => $this->video,
                'specialty_id' => $this->especialidad
            ]);
            $videoSpecialty->save();
            $this->resetUI();
            return redirect()->route('relacionar')->with('status', 'Video y Especialidad, Asociada Correctamente');
        } else {
            return redirect()->route('relacionar')->with('danger', 'Video y Especialidad, se encuentran asociada');
        }
    }

    protected $listeners =[
        'deleteRow' => 'Destroy'
    ];

    public function Destroy($id)
    {
        $videoSpecialty = VideoSpecialty::find($id);
        $videoSpecialty->delete();
        $this->emit('deleted','Se ha eliminado la relación');
    }

    public function resetUI()
    {
        $this->video = "";
        $this->especialidad = "";
    }
}
