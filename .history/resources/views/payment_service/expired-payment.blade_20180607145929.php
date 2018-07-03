@extends('layouts.app')
@section('content')
    
     @foreach ($expiredAll as $expired)
          {{dd($expired)}} 
        {{--
        --}}





        {{$expired['']}}
            {{-- 
            @foreach($expired as $expYear)
                {{$expYear}}
            @endforech
            --}}
     @endforeach
@endsection