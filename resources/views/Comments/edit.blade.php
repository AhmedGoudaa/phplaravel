

@extends('layouts.app')
@section('content')
    <form action="/comment/{{$comment->id}}" method="POST">

        {{method_field('PATCH')}}
        <div class="form-group">
            <textarea name="body" id="body" cols="30" rows="5" class="form-control">{{$comment->body}}</textarea>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">


        </div>

        <button type="submit" class="btn btn-primary"> edit comment</button>

    </form>


@stop