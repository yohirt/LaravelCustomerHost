@extends('layouts.app')
@section('content')
    {{dd($expiredAll->id_client)}}

     @foreach ($expiredAll as $expired)
        {{$expired}}
     @endforeach
@endsection