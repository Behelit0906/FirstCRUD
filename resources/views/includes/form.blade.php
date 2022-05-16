@if ($errors->any())
            <div class="alert alert-danger mt-3" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
     
    <h1>{{$modo}} producto</h1>


    @if (Route::is('producto.create'))
        <div class="form-group mb-1">
            <label for="id">Código</label>
            <input class="form-control" type="text" name="id" id="id" value="{{ $producto->nombre ?? old('nombre') }}">
        </div>
    @endif

    <div class="form-group mb-1">
        <label for="nombre">Nombre</label>
        <input class="form-control" type="text" name="nombre" id="nombre" value="{{ $producto->nombre ?? old('nombre') }}">
    </div>

    <div class="form-group mb-1">
        <label for="marca">Marca</label>
        <input class="form-control" type="text" name="marca" id="marca" value="{{ $producto->marca ?? old('marca')}}">
    </div>

    <div class="form-group mb-1">
        <label for="precio">Precio</label>
        <input class="form-control" type="number" name="precio" id="precio" value="{{ $producto->precio ?? old('precio')}}">
    </div>

    <div class="form-group mb-1">
        <label for="cantidad">Cantidad</label>
        <input class="form-control" type="number" name="cantidad" id="cantidad" value="{{ $producto->cantidad ?? old('cantidad')}}">
    </div>

        
    <input class="btn btn-success mt-3" type="submit" value="{{$modo}}">
    <a class="btn btn-primary mt-3" href="{{route('index')}}">Regresar</a>