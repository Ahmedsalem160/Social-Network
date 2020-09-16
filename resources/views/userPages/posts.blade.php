@extends('layout')

@section('content')
    <div class="container">
        <div class="row" style="padding-right:5px; ">
            @foreach($posts as $post)
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('images/posts/'.$post->img)}}" width="200px" height="250px" class="card-img-top" alt="{{$post->img}}">
                    <div class="card-body">
                        <h5 class="card-title">Title of Post:{{$post->title}}</h5>
                        <p class="card-text">{{$post->body}} </p>

                        <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary">Show</a>
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                        <form method="post" action="{{route('posts.destroy',$post->id)}}" style="display: inline">
                            @method('delete')
                            @csrf
                            <input type="submit" value="Delete" class="btn btn-danger"/>
                        </form>

                        <hr/>
                        <div class="">
                            {{--<ul class="list-group list-group-flush">
                                <li class="list-group-item">Cras justo odio</li>
                                <li class="list-group-item">Dapibus ac facilisis in</li>
                                <li class="list-group-item">Vestibulum at eros</li>
                            </ul> for Comments--}}
                            <h5 class="card-title">Comments</h5>
                            <input type="text" name="body" class="card-text"/>
                            <form method="post" action="{{route('Add.comment',$post->id)}}" style="display: inline">
                                @csrf
                                <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i></button>
                            </form>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop

