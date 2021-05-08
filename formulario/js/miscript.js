/*var opt_1 = new Array("-","Primera","Segunda","Tercera","Cuarta","Quinta","Sexta","Septima");
var opt_2 = new Array ("-","Electrónica","Informática","Mecánica","Plantas Industriales","Química","TCO");

function cambia() {
    var cosa;

    cosa = document.formRegistro.añoSelec[document.formRegistro.añoSelec.selectedIndex].value;
    if (cosa != 0) {
        if (cosa >= 1 && cosa <= 3) {
            mis_opts = eval("opt_" + 1);
        }
        else {
            mis_opts = eval("opt_" + 2);
        }
        num_opts = mis_opts.length;

        document.formRegistro.div_esp.length = num_opts;

        for (i = 0; i < num_opts; i++) {
            document.formRegistro.div_esp.options[i].value = mis_opts[i];
            document.formRegistro.div_esp.options[i].text = mis_opts[i];
        }
    }
    else {
        document.formRegistro.div_esp.length = 1;
        document.formRegistro.div_esp.options[0].value = "-";
        document.formRegistro.div_esp.options[0].text = "-";
    }
    document.formRegistro.div_esp.options[0].selected = true;
}*/

function confirmPass() {
    if (!(document.formRegistro.PassReg.value == document.formRegistro.ConfirmPassReg.value)) {
        document.getElementById("botonenvio").setAttribute("disabled", true);
        document.getElementById("passmatch").innerHTML = "Las contraseñas no coinciden";
        document.getElementById("inputPassword3").style.border = "solid red";
        document.getElementById("inputPasswordConfirm3").style.border = "solid red";
    }
    else {
        if(document.getElementById("inputPassword3").value.length >= 8){
            document.getElementById("botonenvio").removeAttribute("disabled");
            document.getElementById("passmatch").innerHTML = "";
            document.getElementById("inputPassword3").style.border = "solid green";
            document.getElementById("inputPasswordConfirm3").style.border = "solid green";
        }
        else{
            document.getElementById("passmatch").innerHTML = "Las contraseñas deben tener un largo minimo de 8 caracteres";
        }
    }
    if (document.formRegistro.PassReg.value == "" || document.formRegistro.confirmPassReg.value == "" || document.formRegistro.PassReg.value == null || document.formRegistro.confirmPassReg.value == null){
        document.getElementById("botonenvio").setAttribute("disabled",true);
        document.getElementById("inputPassword3").style.border = "solid white";
        document.getElementById("inputPasswordConfirm3").style.border = "solid white";
        document.getElementById("passmatch").innerHTML = "";
    }
}

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

function rusure(){
    if (confirm('¿Estas seguro de enviar este formulario?')){ 
        document.formRegistro.submit();
    }
    else{
        return false;
    }
}