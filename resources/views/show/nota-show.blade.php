@extends('layout.app')
@section('app')

@switch($title)
@case('carpetas')
<div class="button is-info" id="Vistas">
    Carpetas del tema {{$tema->nombre}}
</div>
@break

@case('Notas')
<div class="button is-info" id="Vistas">
    notas de la carpeta {{$tema->nombre}}
</div>
@break

@default

@endswitch

<br>
<br>
<br>
<!--info dinamica-->
<div class="orden">


    @foreach ($data as $i )
    <div class="card hero is-link">

        <div class="card-content">
            <h1 class="title">{{$i->titulo}}</h1>

        </div>
        <footer class="card-footer">
            <a href="{{route('notas-ver',[$i->id])}}" class="card-footer-item hero is-primary">
                <p class="text-link"><b> <i class="bi bi-eye-fill"></i> Ver</b></p>
            </a>
            <a href="{{route('notas-edit',[$i->id])}}" class="card-footer-item hero is-warning">
                <p class="text-link"> <i class="bi bi-pencil-fill"></i> <b>Edit</b></p>
            </a>
            <a href="{{route('notas-eliminar',[$i->id])}}" class="card-footer-item hero is-danger">
                <p class="text-link"> <i class="bi bi-trash-fill"></i> <b>Dele</b></p>
            </a>
        </footer>
    </div>
    @endforeach
</div>


@endsection