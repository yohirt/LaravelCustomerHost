@extends('layouts.app')
@section('content')
    {{dd($expiredAll)}}
     @foreach ($expiredAll as $expired)
        
     @endforeach
@endsection