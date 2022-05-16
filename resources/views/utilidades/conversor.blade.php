@extends('layout.index')

@section('title', 'Utilidades')

@section('content')
    <div class="container mt-4">
        <h1>Conversor de unidades informaticas</h1>

        <div class="form-group mb-1">
            <label for="cantidad">Cantidad</label>
            <input class="form-control mb-1" type="number" name="cantidad" id="cantidad">
        </div>

        <div class="form-group mb-1">
            De
            <select class="form-control" name="from" id="from">
                <option value="bytes">Bytes</option>
                <option value="kilobytes">Kilobytes</option>
                <option value="megabytes">Megabytes</option>
                <option value="gigabytes">Gigabytes</option>
                <option value="terabytes">Terabytes</option>
            </select>
            A
            <select class="form-control" name="to" id="to">
                <option value="bytes">Bytes</option>
                <option value="kilobytes">Kilobytes</option>
                <option value="megabytes">Megabytes</option>
                <option value="gigabytes">Gigabytes</option>
                <option value="terabytes">Terabytes</option>
            </select>
        </div>
        <button class="btn btn-dark mt-2 mb-4" id="calcular">Convertir</button>
        <input class="form-control"  type="text" id="resultado" disabled >
    </div>

    <script src="{{asset('js/conversor.js')}}"></script>
@endsection