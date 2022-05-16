@extends('layout.index')
@section('title','Registrar producto')


@section('content')
    <div class="container mt-4 mb-4">
        <form action="{{route('producto.store')}}" method="post">
            @csrf
            
            @include('includes.form',['modo' => 'Registrar'])
        </form>
    </div>

@endsection