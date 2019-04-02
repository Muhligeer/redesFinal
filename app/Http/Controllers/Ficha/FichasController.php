<?php

namespace App\Http\Controllers\Ficha;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Valida_aluno;
use App\Model\Ficha;
use Auth;

class FichasController extends Controller {

    private $ficha;
    private $totalPage = 10;
    private $aluno;

    public function __construct(Ficha $fichas, Valida_aluno $alunos) {
        $this->ficha = $fichas;
        $this->aluno = $alunos;
    }

    public function indexCOE() {
        return view('coe.fichas.index');
    }

    public function indexOb() {

        $qry = DB::select('
select valida_aluno.nome as nomealuno, CONCAT((percintegr), "%") as integralizacao, area.descricao, orientador.nome, ficha.*
from valida_aluno, orientador, ficha, area
where valida_aluno.gra = ficha.gra and
orientador.codprof = ficha.codprof and
area.codarea = ficha.codarea and
dataencerrado = "0000-00-00" and
obrigatorio = 1
union
select valida_aluno.nome, CONCAT((percintegr), "%"), area.descricao, "", ficha.*
from valida_aluno, ficha, area
where valida_aluno.gra = ficha.gra and
ficha.codprof is null and
area.codarea = ficha.codarea and
dataencerrado = "0000-00-00" and
obrigatorio = 1
order by 1
');
        $fichas = $qry;
        //return $qry;
        return view('coe.fichas.obrigatorio.index', compact('fichas'));
    }

    public function indexNOb() {
        $qry = DB::select('
select valida_aluno.nome as nomealuno, CONCAT((percintegr), "%") as integralizacao, area.descricao, orientador.nome, ficha.*
from valida_aluno, orientador, ficha, area
where valida_aluno.gra = ficha.gra and
orientador.codprof = ficha.codprof and
area.codarea = ficha.codarea and
dataencerrado = "0000-00-00" and
obrigatorio = 0
union
select valida_aluno.nome, CONCAT((percintegr), "%"), area.descricao, "", ficha.*
from valida_aluno, ficha, area
where valida_aluno.gra = ficha.gra and
ficha.codprof is null and
area.codarea = ficha.codarea and
dataencerrado = "0000-00-00" and
obrigatorio = 0
order by 1
');
        $fichas = $qry;
        //return $fichas;
        return view('coe.fichas.naoobrigatorio.index', compact('fichas'));
    }

    public function index() {
        if (Auth::user()->login == 'secretaria') {
            $qry = DB::select('
select ficha.gra, valida_aluno.nome, validationcode, orientador.nome as nomeprof, dtproforientassin, dtcgeassin,
dataencerrado, organizacao from ficha, orientador, valida_aluno where ficha.gra = valida_aluno.gra and
orientador.codprof = ficha.codprof and (dtproforientassin = "0000-00-00" or dtcgeassin = "0000-00-00" or TRUE) and
not (dtaprovcoeorient is null) and dataencerrado = "0000-00-00" order by 2, 4, 2');
            $fichas = $qry;
            return view('secretaria.fichas.index', compact('fichas'));
        }
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
    public function pesquisar(Request $request) {
        $pesq = $request->pesquisaA;

        $qry = DB::select('
select ficha.gra, valida_aluno.nome, validationcode, orientador.nome as nomeprof, dtproforientassin, dtcgeassin,
dataencerrado, organizacao
from ficha, orientador, valida_aluno
where ficha.gra = valida_aluno.gra and
orientador.codprof = ficha.codprof and
(dtproforientassin = "0000-00-00" or dtcgeassin = "0000-00-00" or TRUE) and
not (dtaprovcoeorient is null) and
 ficha.gra LIKE "%' . $pesq . '%" and
dataencerrado = "0000-00-00"
order by 2, 4, 2
');

        $fichas = $qry;

        return view('secretaria.fichas.index', compact('fichas', 'pesq'));
    }

    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCOE($id) {
        $qry = DB::select('
select valida_aluno.nome as nomealuno, CONCAT((percintegr), "%") as integralizacao, area.descricao, orientador.nome, ficha.*
from valida_aluno, orientador, ficha, area
where valida_aluno.gra = ficha.gra and
orientador.codprof = ficha.codprof and
area.codarea = ficha.codarea and
dataencerrado = "0000-00-00" and
 ficha.gra = ?
union
select valida_aluno.nome, CONCAT((percintegr), "%"), area.descricao, "", ficha.*
from valida_aluno, ficha, area
where valida_aluno.gra = ficha.gra and
ficha.codprof is null and
area.codarea = ficha.codarea and
dataencerrado = "0000-00-00" and
ficha.gra = ? 
order by 1
', [$id,$id]);
        //$fichas = $qry;
        //return $fichas;
        //return view('coe.fichas.naoobrigatorio.index', compact('fichas'));
        
        $result = (object) $qry[0];
        //return $result;

        return view('coe.fichas.show', compact('result'));
    }

    public function show($id) {
        //DB::setFetchMode(\PDO::FETCH_ASSOC);
        $qry = DB::select('
select ficha.gra, valida_aluno.nome, validationcode, orientador.nome as nomeprof, dtproforientassin, dtcgeassin,
dataencerrado, organizacao
from ficha, orientador, valida_aluno
where ficha.gra = valida_aluno.gra and
orientador.codprof = ficha.codprof and
(dtproforientassin = "0000-00-00" or dtcgeassin = "0000-00-00" or TRUE) and
not (dtaprovcoeorient is null) and
dataencerrado = "0000-00-00" and 
ficha.gra = ?
order by 2, 4, 2
', [$id]);

        $result = (object) $qry[0];


        return view('secretaria.fichas.show', compact('title', 'result'));
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
        $ficha = $this->ficha->where('gra', $id)->first();

        if ($request->dtcgeassin != null) {
            $update = $ficha->where('gra', $id)->update([
                'dtcgeassin' => $request->dtcgeassin,
            ]);
        }
        if ($request->dtproforientassin != null) {
            $update = $ficha->where('gra', $id)->update([
                'dtproforientassin' => $request->dtproforientassin,
            ]);
        }
        if ($request->dataencerrado != null) {
            $update = $ficha->where('gra', $id)->update([
                'dataencerrado' => $request->dataencerrado,
            ]);
        }



        if ($update) {
            return redirect()->route('fichas.index');
        } else {
            return redirect()->route('fichas.show', $gra);
        }
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
