@if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    @endif
     
    <h1>{{$modo}} producto</h1>


    @if (Route::is('producto.create'))
        <div class="form-group mb-1">
            <label for="id">Código</label>
            <input class="form-control" type="text" name="id" id="id" value="{{ old('id') }}">
        </div>
    @endif

    <div class="form-group mb-1">
        <label for="nombre">Nombre</label>
        <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre') ?? $producto->nombre ?? '' }}">
    </div>

    <div class="form-group mb-1">
        <label for="marca">Marca</label>
        <input class="form-control" type="text" name="marca" id="marca" value="{{ old('marca') ?? $producto->marca ?? ''}}">
    </div>

    <div class="form-group mb-1">
        <label for="precio">Precio</label>
        <input class="form-control" type="number" name="precio" id="precio" value="{{ old('precio') ?? $producto->precio ?? ''}}">
    </div>

    <div class="form-group mb-1">
        <label for="cantidad">Cantidad</label>
        <input class="form-control" type="number" name="cantidad" id="cantidad" value="{{ old('cantidad') ?? $producto->cantidad ?? ''}}">
    </div>

        
    <input class="btn btn-success mt-3" type="submit" value="{{$modo}}">
    <a class="btn btn-primary mt-3" href="{{route('index')}}">Regresar</a>