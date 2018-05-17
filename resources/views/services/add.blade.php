@extends('layouts.app');

@section('title', "Dodaj servis")

@section('content') 
    <h1>Dodaj serwis</h1>
    <form action="{{route('services.save')}}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
            <div  class="form-group">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <input type="text" name="name_service" placeholder="podaj nazwę serwisu" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
      <div class="col-6">
          <div class="form-group">
            <label for="typePayment">Type payment</label>
     
            <select class="form-control" id="typePayment" name="type_settlement">
              <option value="Y">Y - Yearly</option>
              <option value="M">M - Montly</option>
            </select>
          </div>
      </div> 

      <div class="col-6">
          <div class="form-group">
            <label for="priceService">Price</label>
            <input type="text" id="priceService" name="price_service" value="" class="form-control" placeholder="Price">
          </div>
      </div>
  </div>

        <div class="form-group">
            <button class="btn" type="submit">Zapisz</button>
        </div>
        
    </form>
@endsection