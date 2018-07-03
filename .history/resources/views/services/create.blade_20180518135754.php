@extends('layouts.app')
 @section('title', "Dodaj servis") @section('content')
<h1>Dodaj serwis</h1>
<form method="post" action="{{url('services')}}">
         {{ csrf_field() }}
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-grup col-md-4">
            <label for="name_client">Nazwa serwisu/usługi
            </label>
            <input type="text" class="form-control" name="name_service">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8 form-group">
            <div>
                <label for="typePayment">Type payment</label>
                <select class="form-control" id="typePayment" name="type_settlement">
                    <option value="Y">Y - Yearly</option>
                    <option value="M">M - Montly</option>
                </select>
            </div>
            <div>
                <label for="priceService">Price</label>
                <input type="text" id="priceService" name="price_service" value="" class="form-control" placeholder="Price">
            </div>
            <div>
                <label for="description">Price</label>
                <input type="textarea" id="description" name="description" value="" class="form-control" placeholder="Opis">
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