@extends('layouts.app')
@section('content')
    
     @foreach ($expiredAll as $expired)
        {{dd($expired)}}
     @endforeach
@endsection