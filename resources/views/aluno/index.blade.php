@extends('layouts.app')

@section('content')
<h1 class="text-center login-title">DAGA/SA/UFPR - Registro de Estágios</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style="text-align: center; text-justify: auto">
                <br>
                <p>Com o seu GRR, será possível criar ou acessar sua ficha de registro de estágio. No momento da criação, você pode escolher
                    se o estágio é obrigatório ou não-obrigatório. É importante lembrar que somente uma ficha de estágio estará ativa para um 
                    dado GRR em qualquer instante de tempo, ou seja, um mesmo GRR não pode abrir uma ficha de estágio enquanto a ficha anterior
                    a ele associada não tenha sido encerrada. 
                </p><p>Se houver uma ficha de estágio ativa, ela será trazida para atualização; se não houver, uma nova ficha será aberta.
                </p><p>Por favor, preencha todos os campos e observe que, ao dar o aceite no final do formulário, ele não mais poderá ser editado.
                    Ao dar o aceite, um e-mail de confirmação será enviado para o seu endereço eletrônico cadastrado, e a ficha de estágio só 
                    será validada pela COE depois que você a confirmar seguindo o <i>link</i> que estará nesse e-mail.<br>
                </p></div>
            <div class="row justify-content-center">
                {!! Form::open(['route'=>'teste','method' => 'POST']) !!}
                <table bordercolor="white" ><tr>
                        <td><table>
                                <tr>
                                    <td>
                                        <input type="radio" id="r1" value="1" name="obrigatorio">Obrigatório</input>
                                        <input type="radio" id="r2" value="0" name="obrigatorio">Não Obrigatório</input>
                                    </td>
                                </tr>
                                <tr><td></td></tr>
                            </table></td></tr><tr>
                        <td>{!!Form::submit('Abrir Ficha');!!}
                        <button type="submit" >Submeter Relatório</button>
                            
                        </td>
                    </tr></table>
                {!! Form::close()!!}
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

