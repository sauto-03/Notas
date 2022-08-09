@extends('layout.app')
@section('app')

<a href="{{route('notas')}}" class="button"><i class="bi bi-reply-fill"></i></a>
<h1 class="title has-text-centered">{{$nota->titulo}}</h1>
<br>
<div class="section">

    <p class="subtitle">
        {{$nota->nota}}
    </p>
</div>

<br><br>
<h1 class="title has-text-centered">Ejemplo</h1>
<br>
<div class="section" >
    @foreach ($ejemplo as $j )
    <h2> ejemplo: {{$j->id}}</h2>
    <br>
    <code>
        {{$j->ejemplo}}
    </code>
    @endforeach
</div>
@endsection