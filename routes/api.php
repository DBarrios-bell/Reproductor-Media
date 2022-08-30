<?php

use App\Models\AttentionPoint;
use App\Models\Specialty;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/getVideos',function(Request $req){
//     $videos = Video::select('titulo','media',"id")->where('id','1')->get();
//     $videos_parse = [];
//     foreach($videos as $video){
//         array_push($videos_parse,[
//             "id"=>$video->id,
//             "name"=>$video->media,
//             "src"=> '/assets/media/'.$video->video,
//         ]);
//     }
//     return $videos_parse;
// });

// Route::get('/getmedia',function(Request $reg){
//     $reg= Video::create([
//         'titulo'=> $this->titulo,
//         'media'=> $this->media,
//         'descripcion'=> $this->descripcion
//     ]);
//     if($this->media){
//         $nombre = uniqid() . '_.' . $this->media->extension();
//         $this->media->storeAs('/public/assets/media/' , $nombre );
//         $reg->media = $nombre ;
//     }
//     $reg->save();
// });

Route::post('/getEspecialidades',function(Request $req){
    $specialties = Specialty::select('id','nombre')->get();
    $user_specialty = [];
    foreach($specialties as $s){
    array_push($user_specialty,[
        "id"=>$s->id,
        "name"=>$s->nombre,
        ]);
    }
    return $user_specialty;
});

Route::post('/getPAtencion',function(Request $req){
    $atencionpoints = AttentionPoint::select('id','regional')->get();
    $puntoAtention = [];
    foreach($atencionpoints as $pa){
        array_push($puntoAtention,[
            "id" => $pa->id,
            "regional" => $pa->regional,
        ]);
    }
    return $puntoAtention;
});

    // Route::post('/getNavbar',function(Request $req){
    //     $ids = Auth::user()->id;
    //     $user_sessions = User::join('specialties as s','s.id','users.specialty_id')
    //                     ->select('nombre')->where('users.id','1')->get();
    //     $data = [];
    //     foreach($user_sessions as $us){
    //         array_push($data,[
    //         "name" => $us->nombre,
    //         ]);
    //     }
    //     return $data;
    // });