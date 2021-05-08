function resaltarPrecio(idElemento){
    var valor = document.getElementById(idElemento).value;
    if(document.getElementById(idElemento).checked){
        document.getElementById(idElemento + valor).style.fontWeight="bold";
        document.getElementById(idElemento + valor).style.color="green";
    }
    else{
        document.getElementById(idElemento + valor).style.fontWeight="normal";
        document.getElementById(idElemento + valor).style.color="black";
    }
}

function estaActivado(idElemento, idElemento2, idElemento3, idElemento4){
    var valor = document.getElementById(idElemento).value;
    var valor2 = document.getElementById(idElemento2).value;
    var valor3 = document.getElementById(idElemento3).value;
    var valor4 = document.getElementById(idElemento4).value;
    
    if(document.getElementById(idElemento).checked){
        document.getElementById(idElemento + valor).style.fontWeight="bold";
        document.getElementById(idElemento + valor).style.color="green";
    }
    else{
        document.getElementById(idElemento + valor).style.fontWeight="normal";
        document.getElementById(idElemento + valor).style.color="black";
    }

    if(document.getElementById(idElemento2).checked){
        document.getElementById(idElemento2 + valor2).style.fontWeight="bold";
        document.getElementById(idElemento2 + valor2).style.color="green";
    }
    else{
        document.getElementById(idElemento2 + valor2).style.fontWeight="normal";
        document.getElementById(idElemento2 + valor2).style.color="black";
    }

    if(document.getElementById(idElemento3).checked){
        document.getElementById(idElemento3 + valor3).style.fontWeight="bold";
        document.getElementById(idElemento3 + valor3).style.color="green";
    }
    else{
        document.getElementById(idElemento3 + valor3).style.fontWeight="normal";
        document.getElementById(idElemento3 + valor3).style.color="black";
    }

    if(document.getElementById(idElemento4).checked){
        document.getElementById(idElemento4 + valor4).style.fontWeight="bold";
        document.getElementById(idElemento4 + valor4).style.color="green";
    }
    else{
        document.getElementById(idElemento4 + valor4).style.fontWeight="normal";
        document.getElementById(idElemento4 + valor4).style.color="black";
    }
}

function rusure(){
    if (confirm('¿Estas seguro de enviar este formulario?')){ 
        document.formRegistro.submit();
    }
    else{
        return false;
    }
}

function confirmPass(){
    if (!(document.formCambiarPass.PassPerfil2.value == document.formCambiarPass.PassPerfil3.value)) {
        document.getElementById("botonCambioPass").setAttribute("disabled", true);
        document.getElementById("passmatch").innerHTML = "Las contraseñas no coinciden";
        document.getElementById("perfilPassword2").style.border = "solid red";
        document.getElementById("perfilPassword3").style.border = "solid red";
    }
    else {
        if(document.getElementById("perfilPassword2").value.length >= 8){
            document.getElementById("botonCambioPass").removeAttribute("disabled");
            document.getElementById("passmatch").innerHTML = "";
            document.getElementById("perfilPassword2").style.border = "solid green";
            document.getElementById("perfilPassword3").style.border = "solid green";
        }
        else{
            document.getElementById("passmatch").innerHTML = "Las contraseñas deben tener un largo minimo de 8 caracteres";
        }
    }
    if (document.formCambiarPass.PassPerfil2.value == "" || document.formCambiarPass.PassPerfil3.value == "" || document.formCambiarPass.PassPerfil2.value == null || document.formCambiarPass.PassPerfil3.value == null){
        document.getElementById("botonCambioPass").setAttribute("disabled",true);
        document.getElementById("perfilPassword2").style.border = "solid white";
        document.getElementById("perfilPassword3").style.border = "solid white";
        document.getElementById("passmatch").innerHTML = "";
    }
}

