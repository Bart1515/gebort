@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h3>Godkända Annonser</h3>
                @foreach($approved as $ad)
                    <a href="/adverts/{{$ad->id}}/edit">
                        ID: {{ $ad->id}} {{ $ad->title}}
                    </a>
                    <br>
                @endforeach
            <br>
            <h3>Inte Godkända Annonser</h3>
                @foreach($notApproved as $ad)
                    <a href="/adverts/{{$ad->id}}/edit">
                        ID: {{ $ad->id}} {{ $ad->title}}
                    </a>
                    <br>
                @endforeach  
        </div>
    </div>
</div>
@endsection
