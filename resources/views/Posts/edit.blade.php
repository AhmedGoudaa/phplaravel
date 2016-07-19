@extends('layouts.app')
@section('content')

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



<form action="/posts/{{$posts->id}}" method="POST">
    <div class="form-group">
        {{method_field('PATCH')}}
        <input type="text" name="title" id="title"  class="form-control" placeholder="Enter Post Title"  value="{{$posts->title}}">
        <textarea name="content" id="content" cols="30" rows="5" class="form-control" placeholder="Enter post body">{{$posts->content}}</textarea>
        {{csrf_field()}}


    </div>

    <button type="submit" class="btn btn-primary"> Edit Post!</button>

</form>




@stop