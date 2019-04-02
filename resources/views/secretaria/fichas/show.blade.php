
@extends('layouts.app')

@section('content')

{!! Form::open(['route' => ['fichas.update',$result->gra], 'method' => 'put']) !!}
<h1>Formulário {{$result->gra}}</h1>
<br>
<p><b>Nome: </b>{{$result->nome}}</p>
<p><b>Professor Orientador: </b>{{$result->nomeprof}}</p>
<p><b>Organização: </b>{{$result->organizacao}}</p>
<p><b>Data de assinatura do Professor: </b>
 @if($result->dtproforientassin!= "0000-00-00")
 {{Carbon\Carbon::parse($result->dtproforientassin)->format('d/m/Y')}}
 @else
{!!Form::date('dtproforientassin',null  );!!}
@endif
</p>
<p><b>Data de assinatura do CGE: </b>
 @if($result->dtcgeassin!= "0000-00-00")
 {{Carbon\Carbon::parse($result->dtcgeassin)->format('d/m/Y')}}
 @else
{!!Form::date('dtcgeassin',null  );!!}
@endif
</p>

<p><b>Data de assinatura de Encerramento: </b>
 @if($result->dataencerrado!= "0000-00-00")
 {{$result->dataencerrado}}
 @else
{!!Form::date('dataencerrado',null);!!}
@endif
</p>
<br><br><br>

{!!Form::submit('Gravar',['class'=>'btn btn-primary']);!!}

{!! Form::close() !!}
@endsection