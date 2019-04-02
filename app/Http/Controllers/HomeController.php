<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function index()
    {
        $currentUser = app('Illuminate\Contracts\Auth\Guard')->user();
        if($currentUser->login=='secretaria'){
            return view('secretaria.welcomeSecretaria');
        }
        else if($currentUser->login=='coe'){
            return view('coe.homeCOE');
        }else{
            return view('aluno.index');
        }
    }
}
