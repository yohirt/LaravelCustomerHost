@extends('layouts.app')
@section('content')

     @foreach ($expiredAll as $expired)
        {{$expired}}
     @endforeach
@endsection