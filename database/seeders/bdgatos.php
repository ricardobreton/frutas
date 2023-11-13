<?php

namespace Database\Seeders;

use App\Models\TipoMascota;
use Illuminate\Database\Seeder;

class bdgatos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoMascota::create([
            'especie' => 'gato',
            'raza' => 'Sin raza',

        ]);
        $data = file_get_contents("https://api.thecatapi.com/v1/breeds");
        $products = json_decode($data, true);
        foreach ($products as $product) {
            // echo $product['name']. "\n";
            TipoMascota::create([
                'especie' => 'gato',
                'raza' => $product['name'],

            ]);
        }
    }
}
