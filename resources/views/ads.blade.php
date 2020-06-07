@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Annonser</h1>
            <div>
                @foreach($ads as $ad)
                    @if ($ad->approved==1)
                        <div style="border-bottom: 2px dashed  #3490dc;">
                        <br>

                        <h5>
                            <a href="/adverts/{{$ad->id}}">
                                {{$ad->title}}
                            </a>
                        </h5>
                        {{$ad->description}}
                        <br>
                        @foreach($ad->images as $image)
                            <img src="{{asset($image->source)}}" alt="" width="80" height="90">
                        @endforeach
                        <br>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection