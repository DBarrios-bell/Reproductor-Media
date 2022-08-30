<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //62ffcedef2f82.mp4

        Video::create([
            'titulo' => 'video de prueba',
            'media' => '62ffcedef2f82.mp4',
            'descripcion' => 'este es un video de prueba'
        ]);
    }
}
