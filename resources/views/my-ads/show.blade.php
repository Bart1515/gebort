@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{$advert->title}}</h1>
            <div>
                {{$advert->description}}
            </div>
            <div>
                <br>
                @foreach($advert->images as $image)
                <img src="{{asset($image->source)}}" alt="" width="80" height="90">
                @endforeach
                <br>
            </div>
            @auth
            <div>
                <a href="/adverts/{{$advert->id}}/edit">Edit</a>
            </div>
            @endauth
        </div>
    </div>
</div>
@endsection