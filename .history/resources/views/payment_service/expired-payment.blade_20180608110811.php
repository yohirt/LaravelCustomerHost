@extends('layouts.app') @section('content')



<div class="container">

  <table class="table table-hover">
    <thead>
      <th>
        <tr>Klient</tr>
      </th>
    </thead>
    <tbody>
      @foreach ($expiredAll as $expired) 
      <tr>
        <td>
          {{$expired['name_client']}} 
        </td>
          @foreach($expired['expired-year'] as $year) 
            <td>
            {{$year}} 
            </td>
          @endforeach
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@foreach ($expiredAll as $expired) {{$expired['name_client']}} @foreach($expired['expired-year'] as $year) {{$year}} @endforeach
@endforeach @endsection