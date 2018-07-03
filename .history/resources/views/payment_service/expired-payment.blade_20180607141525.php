@extends('layouts.app')
@section('content')

     @foreach ($expiredAll as $expired)
        {{dd($expired[1])}}
     @endforeach
@endsection