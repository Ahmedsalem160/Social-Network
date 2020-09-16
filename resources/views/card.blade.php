@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('images/avatar.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Title of Post</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <hr/>
                <div class="">
                    {{--<ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul> for Comments--}}
                    <h5 class="card-title">Comments</h5>
                    <input type="text" class="card-text"/>
                    <a href="#" class="btn btn-primary"><i class="fa fa-send"></i></a>
                </div>

        </div>
    </div>
        </div>
    </div>
@stop
