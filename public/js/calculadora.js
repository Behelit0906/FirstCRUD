const btnCalcular = document.querySelector('#calcular');
const mensaje = document.querySelector('#message');
const btnBorrar = document.querySelector('#borrar');


    btnCalcular.addEventListener('click', e => {
        
        let valorCompra = Number(document.querySelector('#valorCompra').value);
        let utilidad = Number(document.querySelector('#utilidad').value);
        let impuesto = Number(document.querySelector('#impuesto').value);

        console.log(valorCompra);
        
        if(Number.isInteger(valorCompra) && Number.isInteger(utilidad) && Number.isInteger(impuesto)){
            ganancia = valorCompra * (utilidad / 100);
            iva = valorCompra * (impuesto / 100);
            total = valorCompra + ganancia + iva;
            document.querySelector('#valorVenta').value = total;
            document.querySelector('#ganancia').value = ganancia;
        }

    });

    btnBorrar.addEventListener('click', e => {

        document.querySelector('#valorCompra').value = null;
        document.querySelector('#utilidad').value = null;
        document.querySelector('#impuesto').value = null;
        document.querySelector('#valorVenta').value = null;
        document.querySelector('#ganancia').value = null;

    });