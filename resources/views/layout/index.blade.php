<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <script src="{{mix('js/app.js')}}"></script>
        <title>@yield('title')</title>
    </head>
    <body>
        <!----------------- Navbar  ---------------->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('index')}}">Inventario <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Utilidades
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('calculadora')}}">Calcular valor de venta</a>
                            <a class="dropdown-item" href="{{route('conversor')}}">Conversor de unidades</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Opciones
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('createdb')}}">Crear base de datos</a>
                            <a class="dropdown-item" href="{{route('createtb')}}">Crear tabla</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('createreport')}}">Generar reporte de productos</a>
                            <a class="dropdown-item" href="{{route('createbp')}}">Generar backup de la base de datos</a>
                        </div>
                    </li>
                </ul>
                <a class="navbar-brand" href="#">Computers SAS</a>
            </div>

        </nav>
        <!--------------------------------------------------------------->
        
        @yield('content')

    </body>
</html>