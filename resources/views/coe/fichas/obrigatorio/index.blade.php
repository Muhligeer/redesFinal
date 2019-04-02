@extends('layouts.app')


@section('content')
<h1>Listagem de fichas</h1>
<br><br>
{!! Form::open(['route' => ['pesquisaFicha'],'method' => 'POST']) !!}
{!!Form::text('pesquisaA',$pesq ?? null,['class'=>'form-control','placeholder'=>'GRR','width'=> '600px']);!!}

<br>
{!!Form::submit('Pesquisar',['class'=>'btn btn-primary']);!!}
{!! Form::close() !!}
<br>
<br>
<table class="table table-striped">
    <tr>
        <th>GRR</th>
        <th>Nome</th>
        <th>Integralização</th>

        <th width="100px">Ações</th>
    </tr>
    @foreach($fichas as $aluno)
    
    <tr>
        <td>{{$aluno->gra}}</td>
        <td>{{$aluno->nomealuno}}</td>
        <td>{{$aluno->integralizacao}}</td>
        <td>
            <a href="{{route('ficha', $aluno->gra)}}">
                <span class="fa fa-cloud"></span>
            </a>
        </td>
    </tr>
    
    @endforeach
</table>



@endsection



