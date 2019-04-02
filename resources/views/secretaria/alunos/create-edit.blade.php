
@extends('layouts.app')

@section('content')

@if(isset($aluno))
<h1>Formulário {{$aluno->nome}}</h1>
{!! Form::open(['route' => ['aluno.update',$aluno->gra], 'method' => 'put']) !!}
@else
<h1>Formulário Aluno Novo</h1>
{!! Form::open(['route' => ['aluno.store'],'method' => 'POST']) !!}
@endif

<div class="form-group">
    
    {!! Form::label('GRR:', null, ['class' => 'control-label']) ;!!}
    {!!Form::text('grr',$aluno->gra ?? null,['class'=>'form-control','placeholder'=>'GRR','required']);!!}
    @if ($errors->has('grr'))
    <span class="invalid-feedback">
        <strong style="color:red">{{ $errors->first('grr') }}</strong>
    </span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('Nome Completo:', null, ['class' => 'control-label']);!!}
    {!!Form::text('nome',$aluno->nome ?? null,['class'=>'form-control','placeholder'=>'Nome','required']);!!}
    @if ($errors->has('nome'))
    <span class="invalid-feedback">
        <strong style="color:red">{{ $errors->first('nome') }}</strong>
    </span>
    @endif
    {!!Form::hidden('ativo', 1);!!}
</div>
<div class="form-group">

    {!! Form::label('CPF:', null, ['class' => 'control-label']) ;!!}
    {!!Form::text('cpf',$aluno->cpf ?? null,['class'=>'form-control','onkeyup'=>'mascara(this,mcpf);','placeholder'=>'CPF','required']);!!}
    @if ($errors->has('cpf'))
    <span class="invalid-feedback">
        <strong style="color:red">{{ $errors->first('cpf') }}</strong>
    </span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('Turno:', null, ['class' => 'control-label']) ;!!}
    <br>
    {!!Form::select('turno', ['M' => 'Matutino', 'N' => 'Noturno'], $aluno->turno ?? 'Matutino');!!}
</div>

@if(isset($aluno))
{!!Form::submit('Gravar',['class'=>'btn btn-primary']);!!}
@else
{!!Form::submit('Cadastrar',['class'=>'btn btn-primary']);!!}
@endif
{!! Form::close() !!}
@endsection