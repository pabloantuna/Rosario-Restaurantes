function botonActivo(){
    if(document.formInicio.EmailInic.value == "" || document.formInicio.EmailInic.value == null || document.formInicio.PassInic.value == "" || document.formInicio.PassInic.value == null ){
        document.getElementById("botonenvio").setAttribute("disabled", true);
    }
    else{
        document.getElementById("botonenvio").removeAttribute("disabled");
    }
}