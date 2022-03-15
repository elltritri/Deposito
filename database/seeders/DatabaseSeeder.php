<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Producto;
use App\Models\Deposito;
use App\Models\Estados_producto;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        
        User::create([
            'name' => 'admin',
            'email'=> 'admin@asd.com',
            'password' => bcrypt('asdasdasd')
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
         
         Deposito::create([
            'Descripcion' => 'DEPOSITO',
         ]);
         Deposito::create([
            'Descripcion' => 'PAÑOL',
         ]);
         Deposito::create([
             'Descripcion' => 'AIRE',
          ]);
          Deposito::create([
             'Descripcion' => 'TV',
          ]);
          Deposito::create([
             'Descripcion' => 'CELULARES',
          ]);
          Deposito::create([
             'Descripcion' => 'MICROONDAS',
          ]);
          Deposito::create([
             'Descripcion' => 'SMT',
          ]);
          Deposito::create([
             'Descripcion' => 'HELADERA',
          ]);

          Estados_producto::create([
            'Descripcion' => 'A VERIFICAR',
         ]);
         Estados_producto::create([
             'Descripcion' => 'OK',
          ]);
          Estados_producto::create([
            'Descripcion' => 'UTILIZADO ',
         ]);
         
          

       

         

    }
}
