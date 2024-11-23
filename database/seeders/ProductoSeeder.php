<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('productos')->insert([
            ['descripcion' => 'Objeto de prueba', 'precio' => '1200', 'categoria' => 'Multiusos', 'stock' => '100'],
            ['descripcion' => 'Objeto de prueba', 'precio' => '1200', 'categoria' => 'Multiusos', 'stock' => '100'],
            ['descripcion' => 'Objeto de prueba', 'precio' => '1200', 'categoria' => 'Multiusos', 'stock' => '100'],
            ['descripcion' => 'Objeto de prueba', 'precio' => '1200', 'categoria' => 'Multiusos', 'stock' => '100'],
        ]);
    }
}
