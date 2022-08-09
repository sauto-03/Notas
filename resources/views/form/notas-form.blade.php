@extends('layout.app')
@section('app')

<h1 class="title">Formulario de Notas</h1>

<div class="card">

    <div class="card-content">
        <div class="form-tema" id="form-tema">
            @if (isset($opcion1))
            <form action="{{route('notas-crear')}}" method="post">
                @csrf
                <div class="field">
                    <label class="label">
                        titulo
                    </label>
                    <div class="control">
                        <input type="text" name="titulo" class="input">
                    </div>

                    <label class="label">
                        Nota
                    </label>
                    <div class="control">
                        <textarea class="textarea" placeholder="e.g. Hello world" name="nota"></textarea>
                    </div>
                    <br>
                    <label class="label">Carpeta</label>
                    <select name="id_carpeta" class="input" id="">
                        @foreach ($carpetas as $i )
                        <option value="{{$i->id}}">{{$i->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                @endif

                @if (isset($opcion2))
                <form action="{{route('notas-editar',[$tema->id])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="field">
                        <label class="label">
                            titulo de la nota</label>
                        <div class="control">
                            <input class="input" value="{{$tema->titulo}}" type="text" placeholder="nombre tema" name="titulo">
                        </div>
                        <label class="label">Nota</label>
                        <textarea class="textarea" placeholder="e.g. Hello world" name="nota">
                            {{$tema->nota}}
                        </textarea>
                    </div>
                    @endif
                    <div class="field is-grouped">
                        <div class="control">
                            <button type="submit" class="button is-link">Guardar</button>
                        </div>
                        <div class="control">
                            <a href="{{route('notas')}}" class="button is-danger">Cancelar</a>
                        </div>
                    </div>
                </form>
        </div>



    </div>
</div>



@endsection