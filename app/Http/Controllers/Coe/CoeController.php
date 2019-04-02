<?php

namespace App\Http\Controllers\Coe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Valida_aluno;
class CoeController extends Controller
{
  private $aluno;
    
    public function __construct(Valida_aluno $alunos) {
        $this->aluno = $alunos;
        //$this->middleware('auth:sec')->except('login');
    }

    public function index()
    {
        $alunos = $this->aluno->all();
        return "view('secretaria.welcomeSecretaria',compact('alunos')";
    }

   public function login(){
       return view('coe.loginCOE');
   }
    
    

}
