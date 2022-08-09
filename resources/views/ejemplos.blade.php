@extends('layout.app')
@section('app')


<div class="button is-info" id="Vistas">
    <i class="bi bi-clipboard2-fill" id="icon"></i>

    Ejemplos
</div>

<br>
<br>

<div class="orden2">
    @foreach ($ejemplos as $i )
    <div class="card">

        <div class="card-content">
            <h1 class="subtitle">id de la Nota:{{$i->id_nota}}</h1>
        </div>
        <div class="card-content">
            <code>
                {{$i->ejemplo}}
            </code>
        </div>

        <footer class="card-footer">
            <a href="{{route('ejemplos-edit',[$i->id])}}" class="card-footer-item hero is-warning">
                <p class="text-link"> <i class="bi bi-pencil-fill"></i> <b>Edit</b></p>
            </a>
            <a href="{{route('ejemplos-eliminar',[$i->id])}}" class="card-footer-item hero is-danger">
                <p class="text-link"> <i class="bi bi-trash-fill"></i> <b>Dele</b></p>
            </a>
        </footer>
    </div>
    @endforeach
</div>

<a class="button" href="{{route('form-ejemplo')}}" id="btn-flotante">
    <i class="bi bi-plus-circle-fill"></i>
    Agregar
</a>



@endsection