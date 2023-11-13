<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use Illuminate\Http\Request;

class ClienteAdminController extends Controller
{
    public function index()
    {
        $clientes = Persona::with('usuario')->get();
        return view('admin.clientes.index')->with(compact('clientes'));
    }

    public function verCliente(Persona $cliente)
    {
        $mascotas = $cliente->mascotas()->get();
        return view('admin.clientes.vercliente')->with(compact('cliente','mascotas'));
    }
}
