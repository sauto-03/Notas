<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--desarrollo-->
    <link rel="stylesheet" href="{{asset('static/css/bulma.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('static/iconos/bootstrap-icons.css')}}">
    <title>Notas</title>
</head>

<body>
    <div id="body">


        <div class="columns">
            <div class="column is-four-fifths">
                @yield('app')
            </div>
            <div class="column ">
                <aside class="menu" id="menu">
                    <p class="menu-label">
                        sauto
                    </p>
                    <ul class="menu-list">
                        <figure class="image is-128x128">
                            <img src="{{asset('static/perfil.jpeg')}}">
                        </figure>
                    </ul>
                    <p class="menu-label">
                        Administration
                    </p>
                    <ul class="menu-list">
                        <li><a href="{{route('index')}}">Inicio</a></li>
                        <li><a href="{{route('notas')}}">Notas</a></li>
                        <li><a href="{{route('carpetas')}}">Carpetas</a></li>
                        <li><a href="{{route('notas')}}">Notas</a></li>
                        <li><a href="{{route('ejemplo')}}">Ejemplo</a></li>

                    </ul>
                </aside>
            </div>
        </div>
    </div>
</body>

</html>