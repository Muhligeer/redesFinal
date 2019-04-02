@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    
                    
                    <a href="{{url("/home")}}">Designar Orientadores para Estágios</a><br>
                    <a href="{{url("/home")}}">Editais</a><br>
                    <a href="{{url("/coe/alunos")}}">Manutenção do Cadastro de Alunos</a><br>
                    <a href="{{url("/home")}}">Registrar Orientadores por Área</a><br>
                    <a href="{{url("/coe/fichas")}}">Fichas para Avaliação</a><br>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection