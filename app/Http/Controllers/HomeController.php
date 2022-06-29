<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\api;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('home', ['clientes'=> $clientes]);
    }

    public function getapi(){
        $api = new Api();
        $data = (object)$api->getXFecha();
        return view('api', ['api'=> $api, 'api_data'=> $data]);
    }
}
