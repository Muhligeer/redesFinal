<?php

namespace App\Http\Controllers\Secretaria;
//namespace App\Http\Controllers\Secretaria\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Ficha;
use App\Model\Valida_aluno;

class SecretariaController extends Controller
{
    private $aluno;
    
    public function __construct(Valida_aluno $alunos) {
        $this->aluno = $alunos;
        //$this->middleware('auth:sec')->except('login');
    }

    public function index()
    {
        $alunos = $this->aluno->all();
        return view('secretaria.welcomeSecretaria',compact('alunos'));
    }
    
    public function login(){
        return view('secretaria.loginSecretaria');
    }
    
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
