<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimposioController extends Controller
{
    public function index()
    {
        return view('theme.proanisrl.simposios.index');
    }
}
