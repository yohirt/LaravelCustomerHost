@extends('layouts.app')
@section('content')
    
     @foreach ($expiredAll as $expired)
          {{dd($expired)}} 
        {{--
        --}}



        {{--
        {{dd($expired['expired-year'])}}
                --}}
        
        
        
            {{-- 

            @foreach($expired['expired-year'] as $k => $v)
                
            @endforech
            --}}
     @endforeach
@endsection