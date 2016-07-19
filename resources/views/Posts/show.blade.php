@extends('layouts.app')

@section('content')

    <div class="jumbotron">
         <h1> <span ><font size="3">{{$posts->user->name}}</font></span>  &nbsp  {{$posts->title}} </h1>
        <span ><font size="3">{{$posts->created_at}}</font></span>

        <p>{{$posts->content}}</p>

    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="list-group">Comments:- <br>
        @foreach($posts->comments as $comment)

            <li class="list-group-item">
                <a href="#" style="float:left ">{{$comment->user->name}}</a>
                &nbsp
                {{$comment->body}}
                @if(Auth::user()->id==$comment->user->id)
                    <a href="/comment/{{$comment->id}}/edit" class="btn btn-primary btn-sm" style="float: right">edit</a>
                    @endif
            </li>
            @endforeach
    </div>

    <form action="/posts/{{$posts->id}}/comment" method="POST">
        <div class="form-group">
            <textarea name="body" id="body" cols="30" rows="5" class="form-control">{{old('body')}}</textarea>
            {{csrf_field()}}


        </div>

        <button type="submit" class="btn btn-primary"> comment</button>

    </form>



@stop

