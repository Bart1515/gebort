@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Mina Annonser</h1>

            <ul>
                @foreach($adverts as $ad)
                    <a href="/adverts/{{$ad->id}}">
                        <li>{{$ad->title}}</li>
                    </a>
                @endforeach
            </ul>

        </div>
    </div>
</div>
@endsection
