<?php

namespace App\Http\Livewire;

use App\Models\Video;
use App\Models\VideoSpecialty;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Nurses extends Component
{
    public $videos;

    public function render()
    {
        $id = Auth::user()->specialty_id;
        $videos_parse = [];
        $video = VideoSpecialty::join('videos','videos.id','video_specialties.video_id')
        ->join('specialties','specialties.id','video_specialties.speciality_id')
        ->select('titulo','media',"videos.id")->where('video_specialties.speciality_id',$id)->get();
            foreach($video as $v){
                array_push($videos_parse,[
                "id"=>$v->id,
                "name"=>$v->titulo,
                "src"=> '/storage/assets/media/'.$v->media,
                ]);
            }
        $this->videos = $videos_parse;
        return view('livewire.nurse.content')->extends('layouts.app2')->section('content');

    }

}
