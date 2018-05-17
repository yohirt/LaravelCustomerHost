@extends('layouts.app');

@section('title', "Strona show")

@section('content') 

    <form action="{{route('sites.save')}}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <input type="text" name="title" placeholder="podaj tytuł" class="form-control">
        </div>
        <div class="form-group">
            <textarea name="description" id="" cols="30" rows="10" placeholder="podaj treść" class="form-controll"></textarea>
        </div>

        <div class="form-group">
            <button class="btn" type="submit">Zapisz</button>
        </div>
        
    </form>
@endsection