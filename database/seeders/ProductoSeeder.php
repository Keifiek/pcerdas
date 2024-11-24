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
            ['descripcion' => 'Computadora de escritorio Gaming RTX 3080', 'precio' => '1500', 'categoria' => 'Computadoras', 'stock' => '20'],
            ['descripcion' => 'Procesador Intel Core i9-13900K', 'precio' => '600', 'categoria' => 'Componentes', 'stock' => '50'],
            ['descripcion' => 'Tarjeta gráfica NVIDIA GeForce RTX 4070', 'precio' => '1000', 'categoria' => 'Componentes', 'stock' => '15'],
            ['descripcion' => 'Placa base ASUS ROG Strix Z790-E', 'precio' => '350', 'categoria' => 'Componentes', 'stock' => '30'],
            ['descripcion' => 'Memoria RAM Corsair Vengeance LPX 16GB DDR4', 'precio' => '80', 'categoria' => 'Componentes', 'stock' => '100'],
            ['descripcion' => 'Disco duro SSD Samsung 970 EVO 1TB', 'precio' => '100', 'categoria' => 'Almacenamiento', 'stock' => '40'],
            ['descripcion' => 'Monitor curvo Samsung Odyssey 27"', 'precio' => '300', 'categoria' => 'Perifericos', 'stock' => '25'],
            ['descripcion' => 'Teclado mecánico Logitech G Pro X', 'precio' => '130', 'categoria' => 'Perifericos', 'stock' => '60'],
            ['descripcion' => 'Ratón gamer Razer DeathAdder V2', 'precio' => '60', 'categoria' => 'Perifericos', 'stock' => '80'],
        ]);
    }
}
