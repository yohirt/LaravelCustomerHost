@extends('layouts.app') 
@section('content')
<br /> @if (\Session::has('success'))
<div class="alert alert-success">
    <p>{{ \Session::get('success') }}</p>
</div>
<br /> @endif

<div class="font-italic">
    Zarządzanie serwisami klienta
    <b>

        {{$Client->name_client}}
    </b>
</div>
<hr class="mt-0 ">

<div class="container">
    <div class="row">

        <div class="col">
            {{-- {"id":1,"name_client":"client0a","adress_client":"adress0","city_client":"city0","email_client":"email0@client.pl","postal_code_client":"123-1","tel_client":"123-1111","created_at":"2018-04-20
            14:08:46","updated_at":"2018-04-21 14:29:07"} {{$Client}} --}}
            <h2>
                {{$Client->name_client}}
            </h2>
            <adress>
                <div class="font-italic">
                    {{$Client->adress_client}}
                </div>
                <div class="font-italic">
                    {{$Client->city_client}}
                </div>

                <div class="font-italic">
                    {{$Client->email_client}}
                </div>
                <div class="font-italic">
                    {{$Client->tel_client}}
                </div>
                <p></p>
            </adress>
        </div>

        <div class="col-8">
            <form action="{{action('ClientServiceController@store')}}" method="POST">
                {{ csrf_field()}}
                <input type="hidden" name="client_id" value="{{$Client->id}}">

                <div class="card border-info mb-3" style="max-width: 100%;">
                    <div class="card-header">Dodaj serwis dla klienta
                        <b>
                            {{$Client->name_client}}
                        </b>
                    </div>
                    <div class="card-body text-info">
                        <!-- <h5 class="card-title">Info card title</h5> -->
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Wybierz servis</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="service_id">
                                @foreach ($Services as $service)
                                <option value="{{$service->id}}">
                                    {{$service->name_service}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Data wystartowania</label>
                            <input type="date" name="cs_start_datefirst" id="" class="form-control" placeholder="" aria-describedby="helpId" 
                            value="<?php echo date('Y-m-d');?>" >
                            <small id="helpId" class="text-muted">Data aktywowania usługi - (od tego czasu będą sprawdzane płatności)</small>
                        </div>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    </div>
                    <input type="submit" value="Dodaj serwis" class="btn btn-primary">
                </div>
            </form>

        </div>
    </div>
</div>


<table class="table table-hover ">
    <thead class="thead-default">
        <tr>
            <th>Nazwa Serwisu :)</th>
            <th>Cena</th>
            <th>Rodzaj płatności</th>
            <th>Data wystartowania</th>
            <th>Czy aktywna</th>
            <th>Szczegóły</th>
            <th>Szczegóły</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientServices as $clientService)
        <tr>
            <td scope="row">{{$clientService->name_service}}</td>
            <td>{{$clientService->price_service}}</td>
            <td>{{$clientService->type_settlement}}</td>
            <td>{{$clientService->pivot->cs_start_datefirst}}</td>
            <td>{{$clientService->pivot->cs_start_active}}</td>
            <td>{{$clientService->pivot->id}}aasd</td>
            <td><a href="{{action('paymentServiceController@show', $clientService->pivot->id)}}" class="btn btn-warning">Szczegóły płatności</a></td>
        </tr>

        @endforeach
    </tbody>
</table>
@endsection