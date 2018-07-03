@extends('layouts.app')
@section('content')
    
     @foreach ($expiredAll as $expired)
         
        {{$expired['name_client']}}
     @endforeach
@endsection