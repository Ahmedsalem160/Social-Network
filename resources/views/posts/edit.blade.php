@extends('layout')

@section('content')
    <h1 style="margin-left: 32%">Adding New Post</h1>
    <div class="container">
        <form action="{{route('posts.update',$post->id)}}" method="post">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="validationServer01">Title:</label>
                    <input type="text" name="title" value="{{$post->title}}" class="form-control is-valid" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="validationServer02">Body:</label>
                    <input type="text" name="body" value="{{$post->body}}"   class="form-control is-valid" required/>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Update Post</button>
        </form>
    </div>
@stop
