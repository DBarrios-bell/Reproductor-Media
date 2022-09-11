<?php

namespace App\Http\Livewire;

use App\Models\Video;
use App\Http\Requests;
use App\Models\VideoSpecialty;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Videos extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $titulo,$descripcion,$media,$selected_id,$componentName ,$pageTitle;
    private $pagination = 10;

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Videos';

    }

    public function render()
    {
        $video = Video::all();
        return view('livewire.media.component',[
            'videos' => $video
        ])->extends('layouts.app')
        ->section('content');
    }

    public function Edit($id)
    {
        $edit = Video::find($id,['id','titulo','descripcion','media']);
        $this->titulo = $edit->titulo;
        $this->descripcion = $edit->descripcion;
        $this->selected_id = $edit->id;
        $this->media = null;

         $this->emit('show-modal', 'show modal!');

    }

    public function Store()
    {
        $rules=[
            'titulo' => 'required|min:8|unique:videos',
            'media' => 'required|mimetypes:video/mp4'
        ];

        $this->validate($rules);

        $reg= Video::create([
            'titulo'=> $this->titulo,
            'media'=> $this->media,
            'descripcion'=> $this->descripcion
         ]);
        if($this->media){
            $nombre = uniqid() . '_.' . $this->media->extension();
            $this->media->storeAs('/public/assets/media/' , $nombre );
            $reg->media = $nombre ;
            $this->media;
        }
        $reg->save();
        $this->emit('modal-added','oculta modal');
    }

    public function Update()
    {
        $rules=[
            'titulo' => "required|min:8|unique:videos,titulo,{$this->selected_id}",
            'media' => 'required|mimetypes:video/mp4'
        ];

        $this->validate($rules);

        $video = Video::find($this->selected_id);
        $video->update([
            'titulo'=> $this->titulo,
            'media'=>$this->media,
            'descripcion'=> $this->descripcion,
        ]);
        if($this->media){
            $customMediaName = uniqid() . '_.' . $this->media->extension();
            $this->media->storeAs('/public/assets/media',$customMediaName);
            $mediaName = $video->media;
            $video->media = $customMediaName;
            $video->save();

            if($mediaName !=null){
                if(file_exists('/public/assets/media'. $mediaName)){
                    unlink('/public/assets/media'. $mediaName);
                }
            }
        }
        $this->resetUI();
        $this->emit('update', 'Video Actualizado');
    }

    public function resetUI(){
        $this->titulo = '';
        $this->descripcion = '';
        // $this->search ='';
        $this->media= null;
        $this->selected_id=0;
    }

     protected $listeners =[
     'deleteRow' => 'Destroy'
     ];

    public function Destroy(Video $video)
    {
        if($video){
            $videoSpecialty = VideoSpecialty::where('video_id', $video->id)->count();
            if($videoSpecialty > 0){
                $this->emit('media-specialty','El Video Esta Relacionado con una o mas Especialidades');
            }else{
                dd($video);
                        // $video = Video::find($id);
                        // $video->delete();
            }
        }

    }
}
