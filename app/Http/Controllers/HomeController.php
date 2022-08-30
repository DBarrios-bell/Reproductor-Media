<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $video = Video::all();
         return view('welcome',[
            'videos' => $video
         ])->extends('layouts.app')
         ->section('content');
    }

    public function store(Request $request)
    {
    /*select users.email from projects
    inner join users on projects.user_id=users.id where user_id = 4*/
    $reg=new Video;
    // $reg->user_id= $request->get('user_id');
    $reg->titulo= $request->get('titulo');
    $reg->descripcion= $request->get('descripcion');
    if($request->hasFile('media')){
    $nombre = uniqid();
    $pdf = $request->file('media');
    $extension = $this->obtenerExtension($pdf->getClientOriginalExtension());
    $pdf->move(public_path().'/assets/media/' , $nombre . $extension);
    $reg->archivo = $nombre . $extension;
    }
    $reg->save();

    // $d_email = (Project::select('email')
    // ->join('users','projects.user_id','users.id')
    // ->where('projects.user_id',$request->user_id)->first())['email'];
    // MessageController::sendCorreo("Valida",$d_email);

    return redirect()->back(); //->with('success', 'Documento Cargado con Exito!');
    }
}
