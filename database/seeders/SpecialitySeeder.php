<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  Category::create([
        //  'salepoint_id' => 1,
        //  'name' =>'CURSOS',
        //  'image' => 'https://dummyimage.com/200x150/c97bc9/fff'
        //  ]);
            Specialty::create([
                'nombre'=>'Enfermeria',
                'descripcion'=>'Enfermeria'
            ]);
            Specialty::create([
            'nombre'=>'Fonoaudiologia',
            'descripcion'=>'Fonoaudiologia'
            ]);
            Specialty::create([
            'nombre'=>'medicina General',
            'descripcion'=>'Medicina General'
            ]);
            Specialty::create([
            'nombre'=>'Psicologia',
            'descripcion'=>'Psicologia'
            ]);
    }
}
