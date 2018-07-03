@extends('layouts.app') @section('content')



<div class="container">

  <table class="table table-hover">
    <thead>
      <th>
        <tr>Klient</tr>
      </th>
    </thead>
    <tbody>
      <tr>
      @foreach ($expiredAll as $expired) 
        <td>
          {{$expired['name_client']}} 
          @foreach($expired['expired-year'] as $year) 
            {{$year}} 
          @endforeach
        </td>
      @endforeach
      </tr>
    </tbody>
  </table>
</div>

@endsection