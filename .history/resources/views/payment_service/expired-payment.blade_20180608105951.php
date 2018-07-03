@extends('layouts.app')
@section('content')
    
     @foreach ($expiredAll as $expired)
          {{dd($expired)}} 
        {{--
        --}}



          {{$expired[name_client]}}  
          @foreach($expired['expired-year'] as $x)
            {{$x}}
          @endforeach
        {{--
          {{dd($expired['expired-year'])}}
        --}}
        
        
        
            {{-- 

            @foreach($expired->expired-year as $k )
                
            @endforech
            --}}
     @endforeach
@endsection