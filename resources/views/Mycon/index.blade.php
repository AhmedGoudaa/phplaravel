@extends('layouts.app')


@section('content')
    <div class="title">
        @foreach($people as $person)
            <li>  {{$person}} </li>
        @endforeach

    </div>

@stop


@section('footer')
    <script>

        alert('hello Ahmed gouda =D ')
    </script>

@stop




