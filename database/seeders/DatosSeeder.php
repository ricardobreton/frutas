<?php

namespace Database\Seeders;

use App\Models\Dato;
use Illuminate\Database\Seeder;

class DatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meses = ['Ninguno', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        foreach ($meses as $mes) {
            Dato::create([
                'tipo' => 'meses',
                'valor' => $mes,
            ]);
        }
        $departamentos = ['Santa Cruz', 'La Paz', 'Cochabamba', 'Chuquisaca', 'Tarija', 'Potosi', 'Oruro', 'Beni', 'Pando'];
        foreach ($departamentos as $deparamento) {
            Dato::create([
                'tipo' => 'departamentos',
                'valor' => $deparamento,
            ]);
        }
        $seccion_img = ['index', 'cabecera','pie', 'mapa', 'galeria','imagen'];
        foreach ($seccion_img as $tipo) {
            Dato::create([
                'tipo' => 'tipo',
                'valor' => $tipo,
            ]);
        }
        $secciones = ['Datos Alcaldia', 'Potencial Turisco','Planta Turistica', 'Restaurantes', 'Hospedajes','Turismo Cultural', 'Produccion'];
        foreach ($secciones as $seccion) {
            Dato::create([
                'tipo' => 'seccion',
                'valor' => $seccion,
            ]);
        }
        $tipoImagenes = ['tipo', 'seccion'];
        foreach ($tipoImagenes as $tipImg) {
            Dato::create([
                'tipo' => 'tipo-img',
                'valor' => $tipImg,
            ]);
        }
    }
}
