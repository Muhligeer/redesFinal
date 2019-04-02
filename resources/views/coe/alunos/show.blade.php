
@extends('layouts.app')

@section('content')


<h1>Formulário {{$aluno->gra}}</h1>
<p><b>Nome: </b>{{$aluno->nome}}</p>
<p><b>CPF: </b>{{$aluno->cpf}}</p>
<p><b>Email: </b>{{$aluno->email}}</p>
<p><b>Turno: </b>{{ $aluno->turno === "M" ? "Matutino" : "Noturno" }}</p>
<br><br><br>
{!!Form::open(['route'=>['alunos.destroy',$aluno->gra],'method' => 'delete']) !!}
    {!!Form::submit("Deletar",['class'=>'btn btn-danger'])!!}
{!!Form::close() !!}
@endsection