@extends('layouts.app') @section('content')

  {{dd($expiredAll)}}
{{--
--}}

<div class="container">

  <table class="table table-hover">
    <thead>
      <tr>
        <th>Klient</th>
        <th>Okresy do zapłaty</th>
      </tr>

    </thead>
    <tbody>
      @foreach ($expiredAll as $expired) 
      <tr>
        <td>
          {{$expired['name_client']}} 
        </td>
          <td>
            @foreach($expired['expired-year'] as $year) 
              {{$year}} 
            @endforeach
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection