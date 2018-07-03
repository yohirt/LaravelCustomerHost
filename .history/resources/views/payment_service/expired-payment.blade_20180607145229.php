@extends('layouts.app')
@section('content')
    
     @foreach ($expiredAll as $expired)
        {{dd($expired)}}
        {{$expired['name_client']}}
        {{$expired['expired-year']}}
     @endforeach
@endsection