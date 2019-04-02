function vercpf(cpf)
{
    cpf = tirarMask(cpf);
    if (cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999")
        return false;
    add = 0;
    for (i = 0; i < 9; i ++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
        return false;
    add = 0;
    for (i = 0; i < 10; i ++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
        return false;
    return true;
}


  
    function validaNome(nome)
    {
        if(nome.value == null || nome.value == ""){
            
            document.getElementById("erro_nome").style.color = "red";
            document.getElementById("erro_nome").innerText = "Nome é obrigatório"; 
        }
        else{
            document.getElementById("erro_nome").innerText = '';
        }
    }
function validaCPF(cpf)
    {
        if(cpf.value == null || cpf.value == ""){
            
            document.getElementById("erro_cpf").style.color = "red";
            document.getElementById("erro_cpf").innerText = "CPF é obrigatório"; 
        }
        else{
            document.getElementById("erro_cpf").innerText = '';
        }
    }
function validaRG(rg)
    {
        if(rg.value == null || rg.value == ""){
            
            document.getElementById("erro_rg").style.color = "red";
            document.getElementById("erro_rg").innerText = "RG é obrigatório"; 
        }
        else{
            document.getElementById("erro_rg").innerText = '';
        }
    }

function validaCelular(celular)
    {
        if(celular.value == null || celular.value == ""){
            
            document.getElementById("erro_celular").style.color = "red";
            document.getElementById("erro_celular").innerText = "Telefone é obrigatório"; 
        }
        else{
            document.getElementById("erro_celular").innerText = '';
        }
    }
    
function checkMail(mail) {
    var er = new RegExp(/^[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]{2,}\.[A-Za-z0-9]{2,}(\.[A-Za-z0-9])?/);
    if (typeof (mail) == "string") {
        if (er.test(mail)) {
            return true;
        }
    } else if (typeof (mail) == "object") {
        if (er.test(mail.value)) {
            return true;
        }
    } else {
        return false;
    }
}
  function validaEmail(email)
    {
        

        if(email.value == null || email.value == ""){
            document.getElementById('erro_email').style.color = "red";
            document.getElementById('erro_email').innerText = 'Email é obrigatório';
        }else{
            if( !checkMail(email)) {
                document.getElementById('erro_email').style.color = "red";
                document.getElementById('erro_email').innerText = 'Email incorreto';
            }else{
                
                document.getElementById('erro_email').innerText = '';
            }
        }
    }
    function validaDepartamento(dpto)
    {
        if(dpto.value == null || dpto.value == ""){
            
            document.getElementById("erro_dpto").style.color = "red";
            document.getElementById("erro_dpto").innerText = "Departamento é obrigatório"; 
        }
        else{
            document.getElementById("erro_dpto").innerText = '';
        }
    }
    function validaCargo(cargo)
    {
        if(cargo.value == null || cargo.value == ""){
            
            document.getElementById("erro_cargo").style.color = "red";
            document.getElementById("erro_cargo").innerText = "Cargo é obrigatório"; 
        }
        else{
            document.getElementById("erro_cargo").innerText = '';
        }
    }
    function validaCEP(cep)
    {
        if(cep.value == null || cep.value == ""){
            
            document.getElementById("erro_cep").style.color = "red";
            document.getElementById("erro_cep").innerText = "CEP é obrigatório"; 
        }
        else{
            document.getElementById("erro_cep").innerText = '';
        }
    }
    
    function validaBairro(bairro)
    {
        if(bairro.value == null || bairro.value == ""){
            
            document.getElementById("erro_bairro").style.color = "red";
            document.getElementById("erro_bairro").innerText = "Bairro é obrigatório"; 
        }
        else{
            document.getElementById("erro_bairro").innerText = '';
        }
    }
    
    function validaRua(rua)
    {
        if(rua.value == null || rua.value == ""){
            
            document.getElementById("erro_rua").style.color = "red";
            document.getElementById("erro_rua").innerText = "Rua é obrigatório"; 
        }
        else{
            document.getElementById("erro_rua").innerText = '';
        }
    }

function validaNumero(numero)
    {
        

        if(numero.value == null || numero.value == ""){
            
                document.getElementById("erro_numero").style.color = "red";
                document.getElementById('erro_numero').innerText = 'Número é obrigatório.';
            }else{
                document.getElementById("erro_numero").innerText = '';
            }
        
    }

function tirarMascara() {
    var cpf = document.forms["formularioCadastroFuncionario"]["cpf"].value;
    var rg = document.forms["formularioCadastroFuncionario"]["rg"].value;
    var celular = document.forms["formularioCadastroFuncionario"]["celular"].value;
    var cep = document.forms["formularioCadastroFuncionario"]["cep"].value;
    cpf = tirarMask(cpf);
    rg = tirarMask(rg);
    celular = tirarMask(celular);
    cep = tirarMask(cep);
    document.forms["formularioCadastroFuncionario"]["cpf"].value = cpf;
    document.forms["formularioCadastroFuncionario"]["rg"].value = rg;
    document.forms["formularioCadastroFuncionario"]["celular"].value = celular;
    document.forms["formularioCadastroFuncionario"]["cep"].value = cep;

}
    
    function tirarMask(v){
     
    var pbd = v.replace('.', '');
    pbd = pbd.replace('.','');
    pbd = pbd.replace('-','');
    pbd = pbd.replace(' ','');
    pbd = pbd.replace('(','');
    pbd = pbd.replace(')','');
    return pbd;
}

function validaFormularioFuncionario() {
    var nome = document.forms["formularioCadastroFuncionario"]["nomeFuncionario"].value;
    var email = document.forms["formularioCadastroFuncionario"]["email"].value;
    var cpf = document.forms["formularioCadastroFuncionario"]["cpf"].value;
    var rg = document.forms["formularioCadastroFuncionario"]["rg"].value;
    var celular = document.forms["formularioCadastroFuncionario"]["celular"].value;
    var dpto = document.forms["formularioCadastroFuncionario"]["departamento"].value;
    var cargo = document.forms["formularioCadastroFuncionario"]["cargo"].value;
    var cep = document.forms["formularioCadastroFuncionario"]["cep"].value;
    var estado = document.forms["formularioCadastroFuncionario"]["nomeEstado"].value;
    var cidade = document.forms["formularioCadastroFuncionario"]["nomeCidade"].value;
    var bairro = document.forms["formularioCadastroFuncionario"]["bairro"].value;
    var rua = document.forms["formularioCadastroFuncionario"]["rua"].value;
    var numero = document.forms["formularioCadastroFuncionario"]["numero"].value;
   
    if (nome == null || nome == "") {
        
        document.getElementById("erro_nome").style.color = "red";
        document.getElementById("erro_nome").innerText = "Nome é obrigatório";
        return false;
    }

    if (cpf == null || cpf == "") {
        
        document.getElementById("erro_cpf").style.color = "red";
        document.getElementById("erro_cpf").innerText = "CPF é obrigatório";
        return false;
    } else {
        
        if (vercpf(cpf)==false) {
            
            document.getElementById("erro_cpf").style.color = "red";
            document.getElementById("erro_cpf").innerText = "CPF Inválido";
            return false;
        }

    }
    if (rg == null || rg == "") {
        
        document.getElementById("erro_rg").style.color = "red";
        document.getElementById("erro_rg").innerText = "RG é obrigatório";
        return false;
    }
    if (celular == null || celular == "") {
        
        document.getElementById("erro_celular").style.color = "red";
        document.getElementById("erro_celular").innerText = "Telefone é obrigatório";
        return false;
    }
    if (email == null || email == "") {
        
        document.getElementById('erro_email').style.color = "red";
        document.getElementById('erro_email').innerText = 'Email é obrigatório';
        return false;
    } else {
        if (!(checkMail(email))) {
            document.getElementById('erro_email').style.color = "red";
            document.getElementById('erro_email').innerText = 'Email incorreto';
            return false;
        }
    }
    if (dpto == null || dpto == "") {
       
        document.getElementById("erro_dpto").style.color = "red";
        document.getElementById("erro_dpto").innerText = "Departamento é obrigatório";
        return false;
    }
    if (cargo == null || cargo == "") {
        
        document.getElementById("erro_cargo").style.color = "red";
        document.getElementById("erro_cargo").innerText = "Cargo é obrigatório";
        return false;
    }
    if (cep == null || cep == "") {
        
        document.getElementById("erro_cep").style.color = "red";
        document.getElementById("erro_cep").innerText = "CEP é obrigatório";
        return false;
    }
    if (estado == null || estado == "") {
        
        document.getElementById("erro_estado").style.color = "red";
        document.getElementById("erro_estado").innerText = "Estado é obrigatório";
        return false;
    }
    if (cidade == null || cidade == "") {
        
        document.getElementById("erro_cidade").style.color = "red";
        document.getElementById("erro_cidade").innerText = "Cidade é obrigatório";
        return false;
    }
    if (bairro == null || bairro == "") {
        
        document.getElementById("erro_bairro").style.color = "red";
        document.getElementById("erro_bairro").innerText = "Bairro é obrigatório";
        return false;
    }
    if (rua == null || rua == "") {
       
        document.getElementById("erro_rua").style.color = "red";
        document.getElementById("erro_rua").innerText = "Rua é obrigatório";
        return false;
    }
    if (numero == null || numero == "") {
        
        document.getElementById('erro_numero').style.color = "red";
        document.getElementById('erro_numero').innerHTML = 'Numero incorreto';
        return false;
    }
    
    return true;
}