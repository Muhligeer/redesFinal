@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    
                    
                    <a href="{{url("/coe/fichas/obrigatorio")}}">Estágios Obrigatórios</a><br>
                    <a href="{{url("/coe/fichas/nao-obrigatorio")}}">Estágios Não-Obrigatórios</a><br>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection