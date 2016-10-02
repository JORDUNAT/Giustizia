    function requerir(){
        try
        {
            req=new XMLHttpRequest();
        }catch(err1){
            try
            {
                req=new ActiveXObject("Microsoft.XMLHTTP");
            }catch(err2){
                try
                {
                    req=new ActiveXObject("Msxml2.XMLHTTP");
                }catch(err3){
                    req= false;
                }
            }
        }

    return req;        
    }

    var peticion=requerir();

    function llamarAjaxGETmun(){
        var aleatorio=parseInt(Math.random()*999999999);
        valor=document.getElementById("CboDepartamento").value;
        var url="combos.php?valor="+valor+"&r="+aleatorio;
        peticion.open("GET", url, true);
        peticion.onreadystatechange = respuestaAjaxMuni;
        peticion.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        peticion.send(null);
    }

    function respuestaAjaxMuni(){
      if(peticion.readyState==4){
          if(peticion.status==200){
            document.getElementById("municipios").innerHTML=peticion.responseText;
          } else {
            alert ("Ha ocurrido un error "+peticion.statusText);
          }
      }
    }