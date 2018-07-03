@extends('layouts.app')
@section('content')

     @foreach ($expiredAll as $expired)
        {{dd($expired->id_client)}}
     @endforeach
@endsection