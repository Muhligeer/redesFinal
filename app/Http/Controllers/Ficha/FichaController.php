<?php

namespace App\Http\Controllers\Ficha;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class FichaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        
        
        if ($request->turno == 'N') {
            $subquery = ' and orientador.noturno = 1 ';
        } else {
            $subquery = ' and orientador.diurno = 1 ';
        }
        
        $orientador = DB::select('
            select orientador.codprof, orientador.nome, nestatual
            from orientador
            where orientador.codarea = "'.$request->strarea.'" and
            not exists (select null from ficha where ficha.codprof = orientador.codprof and
            (obrigatorio = 0 or obrigatorio is null) and
            dataencerrado = "0000-00-00" and datainicio > "2016-07-31") and
            nestatual > 0 '.$subquery.'
            union
            select orientador.codprof, orientador.nome, nestatual-sum(if(obrigatorio,0,1))
            from orientador, ficha 
            where orientador.codprof = ficha.codprof and
            (obrigatorio = 0 or obrigatorio is null) and
            dataencerrado = "0000-00-00" and datainicio > "2016-07-31" and
            orientador.codarea = "'.$request->strarea.'" and
             nestatual > 0 '.$subquery.'
            group by 1, 2
            order by 3 desc
        ');
        $result_orientador = (array) $orientador[0];



        $qry = 'insert into ficha ( 
"gra" ,  
"telres" ,  
"telcel" ,  
"telestagio" ,  
"email" ,  
"turno" ,  
"periodo" ,  
"organizacao" ,  
"supervisornome" ,  
"supervisortelefone" ,  
"supervisoremail" ,  
"codarea" ,  
"outraarea" ,  
"datainicio" ,  
"datatermo" ,  
"termocompromisso" ,  
"outrotermo" ,  
"travado", 
"obrigatorio", 
"deacordo",
"validationcode"
) values (' .
                '"' . $request->gra . '", ' .
                '"' . $request->telres . '", ' .
                '"' . $request->telcel. '", ' .
                '"' . $request->strtelestagio . '", ' .
                '"' . $request->telestagio . '", ' .
                '"' . $request->email . '", ' .
                '"' . $request->turno . '", ' .
                '"' . $request->strperiodo . '", ' .
                '"' . $request->organizacao . '", ' .
                '"' . $request->supervisornome . '", ' .
                '"' . $request->supervisortelefone . '", ' .
                '"' . $request->supervisoremail . '", ' .
                '"' . $request->strarea . '", ' .
                '"' . $request . '", ' .
                '"' . $request . '", ' .
                $request . ', ' .
               $request . ',' .
                '"' . $request . '", ' .
                '"' . $request . '")';


        setlocale(LC_TIME, "de-DE");
        $a = strtotime(str_replace('/', '-', $_POST['datainicio']));
        $a = mktime(0, 0, 0, date('n', $a), date('j', $a) + 180, date('Y', $a));
//	echo date("d/M/Y\n", $a);
        $a = mktime(0, 0, 0, date('n', $a), date('j', $a) + 180, date('Y', $a));
//	echo date("d/M/Y\n", $a);

        $qry = 'update ficha set emailvalido = 1, codprof = "' . $r['codprof'] . '", dtaprovcoeorient = NOW() where validationcode = "' . $validationcode . '" and gra="' . $gra . '"';

        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
