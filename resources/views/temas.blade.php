@extends('layout.app')
@section('app')

<div class="button is-info" id="Vistas">
    <i class="bi bi-bookmarks-fill" id="icon"></i>

    Temas
</div>

<br>
<br>
<br>


<!--info dinamica-->
<div class="orden" id="lista">


    @foreach ($temas as $tema )
    <div class="card hero is-link">

        <div class="card-content">
            <h1 class="title"><i class="bi bi-bookmarks-fill"></i>{{$tema->nombre}}</h1>
        </div>
        <footer class="card-footer">
            <a href="{{route('temas-ver',[$tema->id])}}" class="card-footer-item hero is-primary">
                <p class="text-link"><b> <i class="bi bi-eye-fill"></i> Ver</b></p>
            </a>
            <a href="{{route('tema-edit',[$tema->id])}}" class="card-footer-item hero is-warning">
                <p class="text-link"> <i class="bi bi-pencil-fill"></i> <b>Edit</b></p>
            </a>
            <a href="{{route('temas-eliminar',[$tema->id])}}" class="card-footer-item hero is-danger">
                <p class="text-link"> <i class="bi bi-trash-fill"></i> <b>Dele</b></p>
            </a>
        </footer>
    </div>
    @endforeach
</div>


<a class="button" href="{{route('form-tema')}}" id="btn-flotante">
    <i class="bi bi-plus-circle-fill"></i>
    Agregar
</a>


@endsection