<?php

namespace App\Http\Livewire;

use App\Models\Specialty;
use App\Models\User;
use App\Models\Video;
use App\Models\VideoSpecialty;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PlayVideos extends Component
{
    public $videos;

    public function render()
    {
        $id_user = Auth::user()->specialty_id;
        $navbar = Specialty::where('id',$id_user)->get();
        $id = Auth::user()->specialty_id;
        $videos_parse = [];
        $video = VideoSpecialty::join('videos','videos.id','video_specialties.video_id')
        ->join('specialties','specialties.id','video_specialties.specialty_id')
        ->select('titulo','media',"videos.id")
        ->where('video_specialties.specialty_id',$id)->get();
            foreach($video as $v){
                array_push($videos_parse,[
                "id"=>$v->id,
                "name"=>$v->titulo,
                "src"=> '/storage/assets/media/'.$v->media,
                ]);
            }
        $this->videos = $videos_parse;
        return view('livewire.playVideos.component',[
            'nav' => $navbar
        ])->extends('layouts.app2')->section('content');

    }

}
