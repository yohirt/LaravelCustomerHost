@extends('layouts.app')
@section('content')
    
     @foreach ($expiredAll as $expired)


        {{$expired['name_client']}}  
        @foreach($expired['expired-year'] as $year)
          {{$year}}
        @endforeach


     @endforeach
@endsection