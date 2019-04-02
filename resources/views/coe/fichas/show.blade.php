
@extends('layouts.app')

@section('content')


<h1>Formulário {{$result->gra}}</h1>
<br>
<p><b>Nome: </b>{{$result->nomealuno}}</p>
<p><b>Professor Orientador: </b>{{$result->nome}}</p>
<p><b>Organização: </b>{{$result->organizacao}}</p>
<p><b>Telefone Residencial: </b>{{$result->telres}}</p>
<p><b>Celular: </b>{{$result->telcel}}</p>
<p><b>Telefone do Estágio: </b>{{$result->telestagio}}</p>
<p><b>Email: </b>{{$result->email}}</p>
<p><b>Turno</b>{{$result->turno}}</p>
<p><b>Período: </b>{{$result->periodo}}</p>
<p><b>Nome do Supervisor: </b>{{$result->supervisornome}}</p>
<p><b>Telefone do Supervisor: </b>{{$result->supervisortelefone}}</p>
<p><b>Email do Supervisor: </b>{{$result->supervisoremail}}</p>
<p><b>Área: </b>{{$result->codarea}}</p>
<p><b>Outra Área: </b>{{$result->outraarea}}</p>
<p><b>Data de Inicio: </b>{{$result->datainicio}}</p>
<p><b>Data de Término: </b>{{$result->dataencerrado}}</p>
<p><b>Data de Assinatura do Termo: </b>{{$result->datatermo}}</p>
<p><b>Termo de Compromisso: </b>{{$result->termocompromisso}}</p>
<p><b>Outro Termo: </b>{{$result->outrotermo}}</p>
<p><b>Data de Aprovação da COE: </b>{{$result->dtaprovcoeorient}}</p>
<p><b>Data de Assinatura do CGE: </b>{{$result->dtcgeassin}}</p>
<p><b>Data de assinatura do Professor Orientador: </b>{{$result->dtproforientassin}}</p>
<p><b>Data de Entrega do Termo de Compromisso: </b>{{$result->dtentregatermoc}}</p>
<p><b>Comentários: </b>{{$result->comentarios}}</p>
<p><b>Nota Final: </b>{{$result->notafinal}}</p>
<br><button type="submit">Alterar Dados</button>
<br><button type="submit">Ficha</button>
<br><br><br>



@endsection