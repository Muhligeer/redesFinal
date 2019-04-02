@extends('layouts.app')

@section('content')

<h2 style="text-align:center;">Formalização de Pedido de Estágio {{$type}}</h2>
<div class="container" id="preview" style=" border-width: thin; padding: 10px; width: 18cm;">  
    <div>
        <table border="0" width="100%" cellpadding="0" cellspacing="0" summary="">
            <tr><td>

                </td></tr>
            <tr>

                <td class="inner" style="text-align:center;">
                    <h2>Curso de Administração</h2>
                </td>
            </tr>
        </table>
    </div><br>
    {!! Form::open(['route' => ['gravarF'],'method' => 'POST']) !!}
        <table id=""  >
            <tr>
                <td class="firstline">1 - Aluno</td>
                <td class="firstline" >
                    <p id="contains_strnome">
                        <input style="width:236px" id="strnome" type="text" name="nome" value="{{$aluno->nome}}" disabled maxlength="150" />
                    </p>
                </td>
            </tr>
            <tr>
                <td>2 - Registro Acadêmico</td>	
                <td>
                    <p id="contains_strra">
                        <input id="strgra" type="text" name="strgra" value="{{$aluno->gra}}" disabled maxlength="20" />
                    </p>
            </tr>
            <tr>
                <td>3 - Telefone</td>
                <td>
                    <table border="0" cellpadding="0" cellspacing="1" summary="">
                        <tr>
                            <td class="inner"  >Residencial</td>
                            <td class="inner">    <input id="strtelres" tag=1 type="text" name="telres" maxlength="14" onkeyup="mascara(this,mtel);" required/></td>
                        </tr>
                        <tr><td class="inner">Celular</td>
                            <td class="inner">    <input id="strtelcel" type="text" name="telcel" maxlength="15" onkeyup="mascara(this,mtel);" required/></td>
                        </tr>
                        <tr><td class="inner">Estágio</td>
                            <td class="inner"><input id="strtelestagio" type="text" name="telestagio" maxlength="14" onkeyup="mascara(this,mtel);" required/></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>4 - E-mail</td>
                <td>
                    <p id="contains_stremail">
                        <input style="width:236px" id="stremail" type="email" name="email" onblur="" maxlength="127" required/>
                    </p>

                </td>
            </tr>
            <tr>
                <td>5 - Turno em que estuda</td>
                <td>
                    <p>
                        <select id="strturno" name="turno" onblur="" required>
                            <option></option>
                            <option value ="M">Manhã</option>
                            <option value="N">Noite</option>
                        </select>
                    </p>

                </td>
            </tr>
            <tr>
                <td>6 - Período que está cursando</td>
                <td>
                    <p>
                        <select id="strperiodo" name="strperiodo" required>
                            <option></option>
                            @for($i=2;$i<9;$i++)
                            <option value="{{$i}}">{{$i}}º</option>
                            @endfor
                        </select>
                    </p>
                </td>
            </tr>
            <tr>
                <td>7 - Organização onde será realizado o estágio</td>
                <td>
                    <p>
                        <input style="width:236px" id="strorganizacao" type="text" name="organizacao" onblur="" maxlength="127"  required/>
                    </p>
                </td>
            </tr>
            <tr>
                <td>8 - Supervisor no local do estágio</td>
                <td>
                    <table border="0" cellpadding="0" cellspacing="1" summary="">
                        <tr><td class="inner">Nome</td><td class="inner">
                                <input id="strsupervisorlocal" type="text" name="supervisornome" onblur="" maxlength="127"  required/>
                            </td></tr>
                        <tr><td class="inner">Telefones</td><td class="inner">
                                <input id="strsupervisorlocaltelefones" type="text" name="supervisortelefone" onkeyup="mascara(this,mtel);" maxlength="14"  required/>
                            </td></tr>
                        <tr><td class="inner">E-mail</td><td class="inner">
                                <input id="strsupervisorlocalemail" type="text" name="supervisoremail" maxlength="127"  onblur="" required/>
                            </td></tr>
                    </table>
                </td>
            </tr>
            <tr>
            <br>
            <td>9 - Área sobre a qual versará o estágio</td>
            <td>
                <table border="0" cellpadding="0" cellspacing="0" summary="">
                    <tr><td class="inner">	
                            Área Principal: </td>
                        <td class="inner">
                            <select id="strarea" name="strarea" required>
                                <option></option>
                                @foreach($area as $ar)
                                <option value="{{$ar->codarea}}">{{$ar->descricao}}</option>
                                @endforeach
                                <option value="outer">Outra</option>
                            </select>  
                        </td>
                    </tr>
                    <tr id="outraarea" name="outraarea" style="visibility: hidden">

                        <td class="inner">
                            Detalhe a outra área, se for o caso: </td><td class="inner"><input style="margin-top: 0pt;" type="text" id="stroutraarea" >
                        </td></tr>
                </table>	</td>
            </tr>
            <tr>
                <td>10 - Data de inicio do estágio</td>
                <td>
                    <p>
                        <input id="strdatainicio" style="width: 150px;" type="date" name="strdatainicio"  required/>
                    </p>
                </td></tr>

            @if(!($type=="obrigatório"))
            <tr>
                <td>11 - Prazos máximos para entrega dos relatórios a cada semestre</td>
                <td>
                    Data do termo de compromisso com o Plano de Projeto:
                    <input style="width: 155px;" id="strdatatermo" type="date" name="strdatatermo"  required/><br />
                    <span id="span1">Data para o relatório de 06 meses: <a id="dt1"> </a> </span><br /> 
                    <span id="span2">Data para o relatório de 12 meses: <a id="dt2"> </a> </span>
                </td></tr>
            <tr>
                <td>12 - Termo de Compromisso</td>
                <td>
                    <table border="0" cellpadding="0" cellspacing="0" summary="">
                        <tr><td class="inner">	<select name="termocompromisso" id="termocompromisso" onblur="" style="width: 357px;" required>
                                    <option></option>
                                    <option>CIEE</option>
                                    <option>IEL</option>
                                    <option>Empresa Concedente do Estágio</option>
                                    <option>Outro (especifique abaixo)</option>
                                </select>
                            </td></tr><tr><td class="inner">	<input id="stroutrotermo" type="text" name="outrotermo"   maxlength="127" required/><br>
                            </td></tr>
                    </table>	
                </td></tr>
            @endif
        </table>  
        <br />
        <div id="termo" style="text-align: justify; border-width: thin; border-style: solid; padding: 10px; font-family: helvetica; font-size: 7pt; width: 95%;"> 
            Os dados aqui informados são de inteira responsabilidade do aluno estagiário, que responderá em todas as instâncias 
            a respeito de sua veracidade. O aluno estagiário concorda que os seus dados constantes nesta ficha fiquem gravados 
            em um banco de dados, por um prazo definido a critério da Instituição de Ensino. <br />
            <hr />
            Li e estou de acordo com os termos acima 
            <select name="deacordo" id="deacordo" required>
                <option></option>
                <option value="N">NÃO</option>
                <option value="Y">SIM</option>
            </select>
        </div> 
        <div id="contains_pbpost" style="margin-top:36px;">
            <br />

            <input  type="submit" name="post" id="post" value="Enviar" disabled/>
            <span style="padding: 30px;">
                Curitiba,  {{ Carbon\Carbon::setToStringFormat('d/m/Y')}}{{Carbon\Carbon::now()}} - Assinatura: _________________________________________

            </span>
            
            <div style="visibility: hidden ">
                Orientador designado em :
            </div>
         
        </div>
        

   {!! Form::close() !!}
    @endsection