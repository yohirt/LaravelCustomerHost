@extends('layouts.app')
@section('content')
    
     @foreach ($expiredAll as $expired)
        {{--
          {{dd($expired)}} 
        --}}




          @foreach($expired['expired-year'] as $x)
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