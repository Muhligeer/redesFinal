
@extends('layouts.app')

@section('content')


<h1>Formulário {{$aluno->nome}}</h1>
{!! Form::open(['route' => ['alunos.update',$aluno->gra], 'method' => 'put']) !!}
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
    {!!Form::text('cpf',$aluno->cpf ?? null,['class'=>'form-control','placeholder'=>'CPF','required']);!!}
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
<div class="form-group">
    {!!Form::label('E-mail:', null, ['class' => 'control-label']); !!}
    {!!Form::text('email',$aluno->email ?? null,['class'=>'form-control','placeholder'=>'email','required']);!!}
    @if ($errors->has('email'))
    <span class="invalid-feedback" >
        <strong style="color:red">{{ $errors->first('email') }}</strong>
    </span>
    @endif
</div>
@if(isset($aluno))
{!!Form::submit('Gravar',['class'=>'btn btn-primary']);!!}
@else
{!!Form::submit('Cadastrar',['class'=>'btn btn-primary']);!!}
@endif
{!! Form::close() !!}
@endsection