<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('dashboard');
    }


    public function teste()
    {
        $teste = "teste";
        $usuarios = Array('nome' => 'Denis', 'sexo' => 'Adora');
        return view('membros_cadastrar')->with('testex', $usuarios);
    }
}