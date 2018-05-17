@extends('layouts.app')
{{--  
// `clients`(`id`, `name_client`, `adress_client`, `city_client`, `email_client`, `postal_code_client`, `tel_client`, `created_at`, `updated_at`)  --}}


@section('content')
    <h1>Dodaj klienta</h1>
    <form method="post" action="{{url('clients')}}">
         {{ csrf_field()}}

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-6">
            <label for="name_client">Nazwa klenta</label>
            <input type="text" class="form-control" name="name_client">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-6">
            <label for="adress_client">Adres</label>
            <input type="text" class="form-control" name="adress_client">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-6">
            <label for="city_client">Miasto</label>
            <input type="text" class="form-control" name="city_client">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-6">
            <label for="email_client">Email</label>
            <input type="text" class="form-control" name="email_client">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-6">
            <label for="postal_code_client">Kod pocztowy</label>
            <input type="text" class="form-control" name="postal_code_client">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-6">
            <label for="tel_client">Telefon</label>
            <input type="text" class="form-control" name="tel_client">
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-6">
            <button type="submit" class="btn btn-outline-info btn-block">Zapisz</button>
        </div>
    </div>

    </form>
@endsection