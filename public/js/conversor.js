const resultado = document.querySelector("#resultado");
    let btnCalcular = document.querySelector("#calcular");

    let equivalencias = {
        'bytesTOkilobytes': 0.000976563,
        'bytesTOmegabytes':9.53674e-7,
        'bytesTOgigabytes':9.31323e-10,
        'bytesTOterabytes':9.09495e-13,
        'kilobytesTObytes':1024,
        'kilobytesTOmegabytes':0.000976563,
        'kilobytesTOgigabytes':9.53674e-7,
        'kilobytesTOterabytes':9.31323e-10,
        'megabytesTObytes':1048576,
        'megabytesTOkilobytes':1024,
        'megabytesTOgigabytes':0.000976563,
        'megabytesTOterabytes':9.53674e-7,
        'gigabytesTObytes':1073741824,
        'gigabytesTOkilobytes':1048576,
        'gigabytesTOmegabytes':1024,
        'gigabytesTOterabytes':0.000976563,
        'terabytesTObytes':1099511627776,
        'terabytesTOkilobytes':1073741824,
        'terabytesTOmegabytes':1048576,
        'terabytesTOgygabytes':1024};

    btnCalcular.addEventListener('click', e =>{
        var cantidad = document.querySelector("#cantidad").value;
        var from = document.querySelector("#from").value;
        var to = document.querySelector("#to").value;
        if(from == to){
            resultado.value = cantidad;
        }
        else{
            temp = from + "TO" + to;
            
            var mult = 0

            for (let i in equivalencias){
                if(i == temp){
                    
                    mult = cantidad * equivalencias[i];
                    break;
                }
            }

            resultado.value = mult;
            
        }

    });