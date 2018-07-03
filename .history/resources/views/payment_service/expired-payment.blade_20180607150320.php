@extends('layouts.app')
@section('content')
    
     @foreach ($expiredAll as $expired)
        {{--
          {{dd($expired)}} 
        --}}



        {{dd($expired['expired-year'])}}
        {{--
        
        --}}

            
            {{-- 
            --}}
     @endforeach
@endsection