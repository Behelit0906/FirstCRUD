@extends('layout.index')

@section('title', 'Utilidades')

@section('content')
    <div class="container mt-4">
        <h1>Calcular valor de venta</h1>  

        <div class="form-group mb-1">
            <label for="valorCompra">Valor de la compra</label>
            <input class="form-control" type="number" name="valorCompra" id="valorCompra">
        </div>

        <div class="form-group mb-1">
            <label class="label" for="utilidad">Porcentaje de utilidad</label>
            <input class="form-control" type="number" name="utilidad" id="utilidad">  
        </div>

        <div class="form-group mb-1">
            <label class="label" for="impuesto">Porcentaje de impuestos</label>
            <input class="form-control" type="number" name="impuesto" id="impuesto">
        </div>

        <button class="btn btn-dark mt-2" id="calcular">Calcular</button>        
            
        <button class="btn btn-dark mt-2" id="borrar">Borrar</button>

        <div class="form-group mt-5">
            <label class="label" for="valorVenta">Valor de venta</label>
            <input  class="form-control" type="text" id="valorVenta" disabled>
        </div>
        <div class="form-group">
            <label  class="label" for="ganancia">Ganancia</label>
            <input  class="form-control" type="text" id="ganancia" disabled>
        </div>
    </div>

    <script src="{{asset('js/calculadora.js')}}"></script>
@endsection