@extends('layouts.app')
@section('content')
    
     @foreach ($expiredAll as $expired)
        {{dd($expired)}}
        {{$expired['name_client']}}
        {{$expired['name_client']}}
     @endforeach
@endsection