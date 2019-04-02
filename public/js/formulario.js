$(document).ready(function () {
    $('#strarea').change(function () {
            var valor = $(this).val();
            if(valor==="outer"){
                document.getElementById("outraarea").style.visibility ="visible";
            }else
            {
                document.getElementById("outraarea").style.visibility ="hidden";
            }
         });
    $('#deacordo').change(function () {
        var valor = $(this).val();
        console.log(valor);
        if(valor==="Y"){
            document.getElementById("post").removeAttribute("disabled");
        }else
        {
            document.getElementById("post").disabled ="true";
        }
    });


    $('#strdatainicio').change(function () {
       
        var checkInDate = $(this).val();
        var split = checkInDate.split('-');
        var tomorrow = new Date(split[0], split[1], split[2], 0, 0, 0, 0);
        var tomorrow2 = new Date(split[0],split[1], split[2], 0, 0, 0, 0);
        tomorrow.setMonth(tomorrow.getMonth() + 6);
        tomorrow2.setMonth(tomorrow2.getMonth() + 12);
        
        var d2 = tomorrow2.getDate();
        var m2 = tomorrow2.getMonth();
        var y2 = tomorrow2.getFullYear();
        if(m2 === 0){
            m2 = 12;
            y2=y2-1;
        }
        
        var day = tomorrow.getDate();
        var m = tomorrow.getMonth();
        var y = tomorrow.getFullYear();
        if(m===0){
            m=12;
            y=y-1;
        }
        document.getElementById("dt1").innerHTML = day + '/' + m + '/' + y;
        document.getElementById("dt2").innerHTML = d2 + '/' + m2 + '/' + y2;

    });
    
});

