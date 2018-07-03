@extends('layouts.app') @section('content')



<div class="container">

  <table class="table table-hover">
    <thead>
      <th>
        <tr>Klient</tr>
        <tr>Okresy do zapłaty</tr>
      </th>

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