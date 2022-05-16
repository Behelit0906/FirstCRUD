@extends('layout.index')
@section('title','Inventario')


@section('content')

    @if (Session::has('success-message'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{Session::get('success-message')}}  
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> 

    @elseif (Session::has('error-message'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{Session::get('error-message')}}  
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>  
    @endif

    <div class="container mt-5">
        <a href="{{route('producto.create')}}" class="btn btn-dark mb-2">Registrar producto</a>
        <table class="table table-dark">
            <thead class="thead-dark text-center">
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Precio</th>
                    <th>Unidades</th>   
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($productos as $producto )
                    <tr class="text-center">
                        <td>{{$producto->id}}</td>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->marca}}</td>
                        <td>{{'$'.number_format($producto->precio); }}</td>
                        <td>{{$producto->cantidad}}</td>
                        <td>
                        <a href="{{route('edit',$producto->id)}}" class="btn btn-warning">Editar</a>
                            <form action="{{route('producto.delete',$producto->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <input type="submit" onclick="return confirm('¿Deseas realmente borrar el registro?')" value="Borrar" class="btn btn-danger">
                            </form> 
                        </td>
                    </tr>  
                @endforeach   
            </tbody> 
        </table>
        @if ($productos)
        {!! $productos->links() !!}
        @endif
    </div>

@endsection