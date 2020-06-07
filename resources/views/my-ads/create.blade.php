@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Skapa ny annons</h1>

            <form method="POST" action="/adverts">
                {{csrf_field() }}

                <div>
                    <input type="text" name="title" placeholder="titel">
                </div>
                <div>
                    <textarea name="description" placeholder="beskrivning" cols="30" rows="10"></textarea>
                </div>
                <div>
                    <button type="submit">Skapa</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
