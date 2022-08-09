@extends('layout.app')
@section('app')

<h1 class="title">Formulario de Temas</h1>

<div class="card">

    <div class="card-content">
        <div class="form-tema" id="form-tema">
            @if (isset($opcion1))
            <form action="{{route('temas-crear')}}" method="post">
                @csrf
                <div class="field">
                    <label class="label">
                        Nonbre del tema</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="nombre tema" name="nombre">
                    </div>
                </div>
                @endif

                @if (isset($opcion2))
                <form action="{{route('temas-editar',[$tema->id])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="field">
                        <label class="label">
                            Nonbre del tema</label>
                        <div class="control">
                            <input class="input" value="{{$tema->nombre}}" type="text" placeholder="nombre tema" name="nombre">
                        </div>
                    </div>
                    @endif
                    <div class="field is-grouped">
                        <div class="control">
                            <button type="submit" class="button is-link">Guardar</button>
                        </div>
                        <div class="control">
                            <a href="{{route('temas')}}" class="button is-danger">Cancelar</a>
                        </div>
                    </div>
                </form>
        </div>



    </div>
</div>

@endsection