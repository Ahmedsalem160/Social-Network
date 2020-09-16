@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('images/avatar.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Title of Post{{$post->title}}</h5>
                    <p class="card-text">{{$post->body}} content.</p>
                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                    <hr/>
                    <div class="">
                        {{--<ul class="list-group list-group-flush">
                            <li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul> for Comments--}}
                        <h5 class="card-title">Comments ({{$post->comments->count()}})</h5>

                        <form method="post" action="{{route('Add.comment',$post->id)}}" style="display: inline">
                            @csrf
                            <input type="text" name="body" class="card-text"/>
                            <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-send"></i></button>

                        </form>

                    </div>
                    <div class="comment">
                        @foreach($post->comments as $comment)
                            <div class="p-3 mb-2 bg-secondary text-white rounded-pill">
                                <span>{{$comment->user->name}} : {{$comment->created_at->format('Y-m-d')}}</span>
                                <p class="text-sm-center">{{$comment->comment}}</p>
                                <form method="post" action="{{route('delete.comment',$comment->id)}}" style="display: inline;">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" value="Delete" class="btn btn-danger float-left"/>
                                </form>
                            </div>

                        @endforeach
                    </div>

                </div>
            </div>

        </div>
    </div>
@stop
