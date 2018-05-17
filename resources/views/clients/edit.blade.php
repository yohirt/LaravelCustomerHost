@extends('layouts.app')
<!-- edit.blade.php -->
@section('content')
    
<h2>Client</h2><br  />
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        {{--  @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach  --}}
        </ul>
    </div><br />
    @endif
    <form method="post" action="{{action('ClientController@update', $client->id)}}">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name_client" value="{{$client->name_client}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="price">Adress:</label>
                    <input type="text" class="form-control" name="adress_client" value="{{$client->adress_client}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="price">City:</label>
                    <input type="text" class="form-control" name="city_client" value="{{$client->city_client}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="price">City:</label>
                    <input type="text" class="form-control" name="email_client" value="{{$client->email_client}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="price">City:</label>
                    <input type="text" class="form-control" name="postal_code_client" value="{{$client->postal_code_client}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="price">City:</label>
                    <input type="text" class="form-control" name="tel_client" value="{{$client->tel_client}}">
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
                </div>
            </div>
        </form>
        
        
        
        @endsection