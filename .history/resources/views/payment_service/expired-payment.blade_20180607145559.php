@extends('layouts.app')
@section('content')
    
     @foreach ($expiredAll as $expired)
         {{dd($expired)}}
        {{$expired['name_client']}}
       
            @foreach($expired['expired-year'] as $expYear)
                {{$expYear}}
            @endforech
     @endforeach
@endsection