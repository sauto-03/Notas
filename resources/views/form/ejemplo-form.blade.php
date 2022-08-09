@extends('layout.app')
@section('app')

<h1 class="title">Formulario de Notas</h1>

<div class="card">

    <div class="card-content">
        <div class="form-tema" id="form-tema">
            @if (isset($opcion1))
            <form action="{{route('ejemplos-crear')}}" method="post">
                @csrf
                <div class="field">
                    <label class="label">
                        ejemplo
                    </label>
                    <div class="control">
                        <textarea class="textarea" placeholder="e.g. Hello world" name="ejemplo"></textarea>
                    </div>
                    <br>
                    <label class="label">Notas</label>
                    <select name="id_nota" class="input" id="">
                        @foreach ($notas as $i )
                        <option value="{{$i->id}}">{{$i->titulo}}</option>
                        @endforeach
                    </select>
                </div>
                @endif

                @if (isset($opcion2))
                <form action="{{route('ejemplos-editar',[$ejm->id])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="field">
                        <label class="label">
                            ejemplo
                        </label>
                        <div class="control">
                            <textarea class="textarea" placeholder="e.g. Hello world" name="ejemplo">
                            {{$ejm->ejemplo}}
                            </textarea>
                        </div>
                        <br>
                    </div>
                    @endif
                    <div class="field is-grouped">
                        <div class="control">
                            <button type="submit" class="button is-link">Guardar</button>
                        </div>
                        <div class="control">
                            <a href="{{route('ejemplo')}}" class="button is-danger">Cancelar</a>
                        </div>
                    </div>
                </form>
        </div>



    </div>
</div>


<br>
<br>
<br>


@endsection