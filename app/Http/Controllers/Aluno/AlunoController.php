<?php

namespace App\Http\Controllers\Aluno;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Valida_aluno;
use App\Model\Ficha;
use App\Model\Area;

class AlunoController extends Controller
{
    protected $aluno;
    protected $ficha;
    protected $area;
    public function __construct(Ficha $fichas, Valida_aluno $alunos,Area $areas) {
        
        $this->ficha = $fichas;
        $this->aluno = $alunos;
        $this->area = $areas;
    }

    public function index() {
            $type = "não-obrigatório";
            return view('aluno.ficha',compact('type'));
            
    }
    
    public function forms(Request $request){
            $validationcode = md5(uniqid(rand(), true));
            
        if ($request->obrigatorio == "0") {
            $type = "não-obrigatório";
        } else {
            $type = "obrigatório";
        }

        $aluno = $this->aluno->where('gra', \Auth::user()->login)->first();
        
        $area = $this->area->all();
            
        
        //return view('secretaria.alunos.show',compact('title','aluno'));
            
            return view('aluno.ficha',compact('type','aluno','area'));
        
    }
    
    public function create()
    {
        //
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
