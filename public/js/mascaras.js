function mascara(o,f){
    v_obj=o;
    v_fun=f;
    setTimeout("execmascara()",1);
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value);
}

function mcep(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{5})(\d)/g,"$1-$2");
    return v;
}

function msal(v){
    v=v.replace(/\D/g,"");//Remove tudo o que não é dígito
    v=v.replace(/(\d)(\d{11})$/,"$1.$2");
    v=v.replace(/(\d)(\d{8})$/,"$1.$2");//coloca o ponto dos milhões
    v=v.replace(/(\d)(\d{5})$/,"$1.$2");//coloca o ponto dos milhares
    v=v.replace(/(\d)(\d{2})$/,"$1,$2");//coloca a virgula antes dos 2 últimos dígitos
    return v;
       }

function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2");
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function mcpf(v){
    v=v.replace(/\D/g,"");
    //v=v.replace(/^(\d{3})(\d)/g,"$1.$2");
     v=v.replace(/(\d)(\d{8})$/,"$1.$2");
    v=v.replace(/(\d)(\d{5})$/,"$1.$2");
    v=v.replace(/(\d)(\d{2})$/,"$1-$2");
    return v;
}

function mrg(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
     v=v.replace(/(\d)(\d{7})$/,"$1.$2");
    v=v.replace(/(\d)(\d{4})$/,"$1.$2");
    v=v.replace(/(\d)(\d{1})$/,"$1-$2");  
    return v;
}

