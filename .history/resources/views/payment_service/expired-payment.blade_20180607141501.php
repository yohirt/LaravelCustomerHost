@extends('layouts.app')
@section('content')

     @foreach ($expiredAll as $expired)
        {{dd($expired[0])}}
     @endforeach
@endsection