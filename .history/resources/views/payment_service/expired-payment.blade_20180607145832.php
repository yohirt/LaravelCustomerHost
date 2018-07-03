@extends('layouts.app')
@section('content')
    
     @foreach ($expiredAll as $expired)
        {{--
          dd($expired) 
        --}}
        {{$expired['name_client']}}
            {{-- 
            @foreach($expired as $expYear)
                {{$expYear}}
            @endforech
            --}}
     @endforeach
@endsection