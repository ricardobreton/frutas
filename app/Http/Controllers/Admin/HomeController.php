<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function __construct()
    {
        $this->middleware('can:panel.index')->only('index');
    }

    public function index()
    {
        switch (Auth::user()->adminlte_desc()) {
            case 'Cliente':
                return view('cliente.index');
                break;
            default:
                return view('admin.index');
                break;
        }
    }
}
