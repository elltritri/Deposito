<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Producto;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name' => 'admin',
            'email'=> 'admin@asd.com',
            'password' => bcrypt('asdasdasd')
        ]);

        Producto::create([
           'Descripcion' => 'PAÑOL',
        ]);
        Producto::create([
            'Descripcion' => 'AIRE',
         ]);
         Producto::create([
            'Descripcion' => 'TV',
         ]);
         Producto::create([
            'Descripcion' => 'CELULARES',
         ]);
         Producto::create([
            'Descripcion' => 'MICROONDAS',
         ]);
         Producto::create([
            'Descripcion' => 'SMT',
         ]);
         Producto::create([
            'Descripcion' => 'HELADERA',
         ]);
         

         

    }
}
