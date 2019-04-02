<?php

namespace App\Http\Controllers\Aluno;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Valida_aluno;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class AlunosController extends Controller {

    private $aluno;
    private $totalPage = 10;

    public function __construct(Valida_aluno $alunos) {
        $this->middleware('auth');
        $this->aluno = $alunos;
    }

    public function index() {
        
        $alunos = $this->aluno->paginate($this->totalPage);
        if(Auth::user()->login == 'secretaria')
            return view('secretaria.alunos.index', compact('alunos'));
        else
            return view('coe.alunos.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $title = 'Cadastro de Alunos';
        return view('secretaria.alunos.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        /* $dataForm = $this->aluno;
          $dataForm->nome = $request->nome;
          $dataForm->datacadastro = '';
          $dataForm->cpf = $request->cpf;
          $dataForm->turno = $request->turno;
          $dataForm->gra = $request->gra;
          $dataForm->email= $request->email;
          $dataForm->ativo = 1 ;

          $insert = $dataForm->save(); */

        /*$messages = [
            'gra.required' => 'O campo GRR é obrigatório.'
        ];
*/
        
        //$this->validate($request, $this->aluno->rules, $messages);
        
        $insert = $this->aluno->insert([
            'nome' => $request->nome,
            'datacadastro' => \Carbon\Carbon::now(),
            'cpf' => $request->cpf,
            'turno' => $request->turno,
            'gra' => $request->grr,
            'email' => '',
            'ativo' => 1,
            'percintegr' => '0'
        ]);
       
        if ($insert) {
            User::create([
            'name' => $request->nome,
            'login' => $request->grr,
            'password' => Hash::make($request->cpf),
        ]);
            return redirect()->route('alunos.index');
        } else {
            return redirect()->route('alunos.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     public function pesquisar(Request $request)
    {
       $pesq = $request->pesquisaA;
       
      $alunos = $this->aluno->where('gra','LIKE',"%{$pesq}%")->paginate($this->totalPage);
      $currentUser = app('Illuminate\Contracts\Auth\Guard')->user();
        if($currentUser->email=='secretaria'){
        return view('secretaria.alunos.index', compact('alunos','pesq'));
        }else if($currentUser->email=='coe'){
             return view('secretaria.alunos.index', compact('alunos','pesq'));
        }
    }
    
    public function show($id) {
        
        $aluno = $this->aluno->where('gra', $id)->first();
        
        $currentUser = app('Illuminate\Contracts\Auth\Guard')->user();
        $title= "Aluno: {$aluno->nome}";
         if($currentUser->email=='secretaria'){
        return view('secretaria.alunos.show',compact('title','aluno'));
         }else if($currentUser->email=='coe'){
             return view('coe.alunos.show',compact('title','aluno'));
         }
         
    }
    
    
    public function edit($gra) {

        $aluno = $this->aluno->where('gra', $gra)->first();
        $title = "Editar aluno {$aluno->nome}";
        return view('secretaria.alunos.create-edit', compact('title', 'aluno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $gra) {
        
        $aluno = $this->aluno->where('gra', $gra)->first();

        $update = $aluno->where('gra',$gra)->update([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'turno' => $request->turno,
            'gra' => $request->grr,
            
        ]);

        if ($update) {
            return redirect()->route('alunos.index');
        } else {
            return redirect()->route('alunos.edit',$gra);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
         $aluno = $this->aluno->where('gra', $id)->first();
         
         $delete = $aluno->where('gra',$id)->delete();
         
        if ($delete) {
            return redirect()->route('alunos.index');
        } else {
            return redirect()->route('alunos.show',$id);
        }
    }

}
