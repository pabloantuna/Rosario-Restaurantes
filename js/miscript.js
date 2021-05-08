function cambiarColor(n){
    n--;
    if(n%2 == 0){
        prueba = document.getElementsByName("palfondo")
        //t.style.backgroundColor = "red";
        prueba[n].style.backgroundColor  = "#f8dcaf";
    }
}