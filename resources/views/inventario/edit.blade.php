@extends('layout.index')

@section('content')
    <div class="container mt-4">
        <form action="{{route('producto.update',$producto)}}" method="post">
            @csrf
            @method('put')
            
            @include('includes.form',['modo' => 'Editar'])
        </form>
    </div>
@endsection