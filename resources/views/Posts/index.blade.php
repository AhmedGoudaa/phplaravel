@extends('layouts.app')
@section('content')

    @include('Posts._form')
    @foreach($posts as $post)
    <div class="alert alert-info fade in">
        <a href="posts/{{$post->id}}"  {{method_exists($post,'DELETE')}} class="close" data-dismiss="alert" aria-label="close">

            {{--<a href="/posts/{{$post->id}}" data-method="delete" class="close"--}}
               {{--data-token="{{csrf_token()}}"  data-confirm="Are you sure?">&times;--}}

                <form class="delete" action="/posts/{{$post->id}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="submit" value="Delete">
                </form>



        </a>


        {{--<a href="posts/{{$post->id}}" >--}}
            {{--{{Form::open([ 'method'  => 'delete', 'route' => [ 'posts.destroy', $post->id ] ])}}--}}
            {{--{{ Form::hidden('id', $item->id) }}--}}
            {{--{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}--}}
            {{--{{ Form::close() }}--}}
        {{--</a>--}}



        <li>
                    <a href="#" style="float:left "  data-toggle="tooltip" title="user name ">{{$post->user->name}}</a>
                    &nbsp
                    <a href="posts/{{$post->id}}" data-toggle="tooltip" title="Post title ">{{$post->title}}</a>
                    @if(Auth::user()->id==$post->user->id)
                        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-sm" style="float: right">edit</a>
                    @endif
                </li>


    </div>
    @endforeach








        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });

            $(".delete").on("submit", function(){
                return confirm("Do you want to delete this item?");
            });

        </script>




@stop