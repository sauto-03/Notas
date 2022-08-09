@extends('layout.app')
@section('app')

<div class="button is-info" id="Vistas">
    <i class="bi bi-person-fill" id="icon"></i>

    Inicio
</div>
<br>
<br>
<br>

<div class="section">

    <div class="columns">
        <div class="column">
            <p class="title has-text-centered" id="bienvenida">Bienvenido <br>
                Sauto
            </p>
        </div>
        <div class="column">
            <img src="{{asset('static/perfil.jpeg')}}" width="255px" height="255px" class="img-perfil">
        </div>
    </div>

    <br>
    <br>

    <div class="orden">
        <!--Temas-->
        <a href="{{route('temas')}}">
            <div class="card hero is-danger" id="card">
                <div class="card-content">

                    <i class="bi bi-bookmarks-fill" id="icon2"></i>
                    Temas

                </div>
            </div>
        </a>
        <!--Carpetas-->
        <a href="{{route('carpetas')}}">
            <div class="card hero is-link" id="card">
                <div class="card-content">

                    <i class="bi bi-folder-fill" id="icon2"></i>

                    Carpetas

                </div>
            </div>
        </a>
        <!--Notas-->
        <a href="{{route('notas')}}">
            <div class="card hero is-primary" id="card">
                <div class="card-content">

                    <i class="bi bi-clipboard2-fill" id="icon2"></i>

                    Notas

                </div>
            </div>
        </a>
    </div>
</div>
@endsection