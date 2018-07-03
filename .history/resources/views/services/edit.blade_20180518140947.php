@extends('layouts.app')
@section('title', "Dodaj servis")
@section('content')
<h1>Edycja serwisu id {{$service->id}}</h1>
<form  action="{{action('ServiceController@update', $service->id)}}" method="post">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-grup col-md-4">    
            <label for="name_client">Nazwa klenta</label>
            <input type="text" class="form-control" name="name_service" value="{{$service->name_service}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8 form-group">
            <div>
                <label for="typePayment">Type payment</label>
                <select class="form-control" id="typePayment" name="type_settlement">
                    <option value="Y" @if($service->type_settlement=="Y") selected @endif>Y - Yearly</option>
                    <option value="M" @if($service->type_settlement=="M") selected @endif>M - Montly</option>
                </select>
            </div>
            <div>
                <label for="priceService">Price</label>
                <input type="text" id="priceService" name="price_service" value="{{$service->price_service}}" class="form-control" placeholder="Price">
            </div>
            <div>
                <label for="description">Opis</label>
                <input type="text" id="description" name="description" value="{{$service->description}}" class="form-control" placeholder="Opis">
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-8">
            <button class="btn btn-outline-info btn-block" type="submit">Zapisz</button>
        </div>

    </div>

</form>
@endsection