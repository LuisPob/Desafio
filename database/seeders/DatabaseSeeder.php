<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'luis poblete',
            'email' => 'luis@gmail.com',
            'password' => Hash::make('test12345'),
        ]);

        DB::table('generos')->insert([
            'nombre_genero' => 'Rock',
            'descripcion_genero' => 'Test',
        ]);
        

        DB::table('artistas')->insert([
            'nombre_artista' => 'Imagine dragons',
            'fecha' => '1999-01-01',
            'imagen_artista' => 'uploads\JaDS4T8y2p03vMkiM1EIKanSYJmHGPzwmNzT6DX7.jpg',
            'descripcion_artista' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.',

        ]);
        DB::table('artistas')->insert([
            'nombre_artista' => 'Imagine dragons',
            'fecha' => '1999-01-01',
            'imagen_artista' => 'uploads\JaDS4T8y2p03vMkiM1EIKanSYJmHGPzwmNzT6DX7.jpg',
            'descripcion_artista' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.',

        ]); DB::table('artistas')->insert([
            'nombre_artista' => 'Imagine dragons',
            'fecha' => '1999-01-01',
            'imagen_artista' => 'uploads\JaDS4T8y2p03vMkiM1EIKanSYJmHGPzwmNzT6DX7.jpg',
            'descripcion_artista' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.',

        ]);

        DB::table('lanzamientos')->insert([
            'nombre_lanzamiento' => 'imagine',
            'fecha_lanzamiento' => '2023-04-04',
            'caratula' => 'uploads\download.jpg',
            'descripcion_lanzamiento' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.',
            'tipo' => 'Album',
            'id_genero' => '1',
        ]);
        DB::table('lanzamientos')->insert([
            'nombre_lanzamiento' => 'imagine',
            'fecha_lanzamiento' => '2023-04-04',
            'caratula' => 'uploads\download.jpg',
            'descripcion_lanzamiento' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.',
            'tipo' => 'Album',
            'id_genero' => '1',
        ]); DB::table('lanzamientos')->insert([
            'nombre_lanzamiento' => 'imagine',
            'fecha_lanzamiento' => '2023-04-04',
            'caratula' => 'uploads\download.jpg',
            'descripcion_lanzamiento' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.',
            'tipo' => 'Album',
            'id_genero' => '1',
        ]);

        DB::table('realizas')->insert([
            'id_artista' => '1',
            'id_lanzamiento' => '1',
        ]);
        

        DB::table('canciones')->insert([
            'id_lanzamiento' => '1',
            'num_pista' => '1',
            'titulo' => 'aaaaa',
            'duracion' => '92',
            'reproducciones' => '1000',
        ]);
        DB::table('canciones')->insert([
            'id_lanzamiento' => '1',
            'num_pista' => '2',
            'titulo' => 'aaaaaaaaaaaaaaa',
            'duracion' => '423',
            'reproducciones' => '500',
        ]);
        

        
    }
}
