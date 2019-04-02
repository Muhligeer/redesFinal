
@extends('layouts.app')


@section('content')
<h1>Listagem de Alunos</h1>
<br><br>
<a href="{{route('aluno.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"> </span> Cadastrar</a>
<br>
<br>
{!! Form::open(['route' => ['pesquisaAluno'],'method' => 'POST']) !!}
{!!Form::text('pesquisaA',$pesq ?? null,['class'=>'form-control','placeholder'=>'GRR','width'=> '600px']);!!}

<br>
{!!Form::submit('Pesquisar',['class'=>'btn btn-primary']);!!}
{!! Form::close() !!}
<br>
<br>
@endsection
@section('tabela')
<table class="table table-striped">
    <tr>
        <th>GRR</th>
        <th>Nome</th>
        <th>Turno</th>
        <th>CPF</th>
        <th>Email</th>

        <th width="100px">Ações</th>
    </tr>
    @foreach($alunos as $aluno)
    <tr>
        <td>{{$aluno->gra}}</td>
        <td>{{$aluno->nome}}</td>
        <td>      
            @if($aluno->turno=='M')
            Matutino
            @else
            Noturno
            @endif
        </td>
        <td>{{$aluno->cpf}}</td>
        <td>{{$aluno->email}}</td>
        <td>
            <a href="{{route('aluno.edit', $aluno->gra)}}">
                <span class="fa fa-cloud"></span>
            </a>
            <a href="{{route('aluno.show', $aluno->gra)}}">
                <span class="fa fa-cloud"></span>
            </a>
        </td>
    </tr>
    @endforeach
</table>

{!!$alunos->links() !!}
@endsection

