@extends('layout')

@section('content')
    <h1 style="margin-left: 32%">Adding New Post</h1>
    <div class="container">
        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="validationServer01">Title:</label>
                    <input type="text" name="title" class="form-control is-valid @error('title') is-invalid @enderror" >
                    <div class="valid-feedback @error('title') is-invalid @enderror">
                        @error('title')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="validationServer02">Body:</label>
                    <textarea name="body" rows="7" cols="80" class="form-control is-valid @error('body') is-invalid @enderror" ></textarea>
                    @if($errors->any())
                    <div class="valid-feedback @error('body') is-invalid @enderror">
                        @error('title')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @endif
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="validationServer02">Image of Your Post</label>
                    <input type="file" name="img"/>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Add New Post</button>
        </form>
    </div>
@stop
{{--
<input id="title" type="text" class="@error('title') is-invalid @enderror">

@error('title')
<span class="alert alert-danger">{{ $message }}</apan>
@enderror--}}
