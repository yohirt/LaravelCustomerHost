@extends('layouts.app')
{{--  
// `clients`(`id`, `name_client`, `adress_client`, `city_client`, `email_client`, `postal_code_client`, `tel_client`, `created_at`, `updated_at`)  --}}

@section('content')
<h1>Klienci</h1>
<br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
<table class="table table-hover">
    @foreach ($clients as $client)
        <tr>
            <td>
                {{$client->name_client}}
            </td>
            <td>
                {{$client->adress_client}}
            </td>
            <td>
                {{$client->city_client}}
            </td>
            <td>
                <a href="{{action('ClientController@edit', $client->id)}}" class="btn btn-info">Edytuj klienta</a>
            </td>
            <td> 
                <a href="{{action('ClientServiceController@show', $client->id)}}" class="btn btn-warning">Zarządzaj serwisami klienta</a>
            </td>
            <td> 
                <form action="/clients/{{$client->id}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                 
                    {{--  <a href="#" class="btn btn-info">Delete</a>  --}}
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td> 
        </tr>
    @endforeach
</table>
    
@endsection