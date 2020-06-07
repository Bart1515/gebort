@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Ändra annons</h1>

            <form method="POST" action="/adverts/{{$advert->id}}">
                {{ method_field('PATCH') }}
                {{csrf_field() }}

                <div>
                    <input type="text" name="title" placeholder="titel" value="{{$advert->title}}">
                </div>
                <div>
                    <textarea name="description" placeholder="beskrivning" cols="30" rows="10">{{$advert->description}}</textarea>
                </div>
                @if ($user->isAdmin())
                <div>
                    <input type="checkbox" name="approved" value="true" {{$advert->approved == 1 ? 'checked' : ''}}>
                    <label for="approved">Godkänd</label>
                </div>
                @endif
                <div>
                    <button type="submit">Uppdatera</button>
                </div>
            </form>
            <form method="POST" action="/adverts/{{$advert->id}}">
                {{ method_field('DELETE') }}
                {{csrf_field() }}

                <div>
                    <button type="submit">Ta bort annons</button>
                </div>
            </form>
            <br>
            <!-- width="500" height="600" -->
            @foreach($images as $image)
            <div style="float:left">
                <img src="{{asset($image->source)}}" alt="" width="50" height="60">

                <form method="POST" action="/images/{{$image->id}}">
                    {{ method_field('DELETE') }}
                    {{csrf_field() }}

                    <div>
                        <button type="submit">Ta bort bild</button>
                    </div>
                </form>
            </div>

            @endforeach
            <br>
            <br>
            <div>
                <form method="POST" action="/images" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="adId" value="{{$advert->id}}">
                    <input type="file" name="image">
                    <div>
                        <button type="submit">Lägg upp bild</button>
                    </div>
                </form>
            </div>
            <br>

        </div>
    </div>
</div>
@endsection