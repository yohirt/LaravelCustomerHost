@extends('layouts.app')
@section('content')

     @foreach ($expiredAll as $expired)
        {{$expired->id_client}}
     @endforeach
@endsection