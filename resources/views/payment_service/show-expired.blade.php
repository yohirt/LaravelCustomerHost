@extends('layouts.app') @section('content')
<br /> @if (\Session::has('success'))
<div class="alert alert-success">
    <p>{{ \Session::get('success') }}</p>
</div>
<br /> @endif

<div class="font-italic">
    <h2>
        Płatności
        <!-- <b>
            {{$service->name_service}}
        </b>
        dla klienta -->
        <b>
            {{$client->name_client}}
        </b>
    </h2>
</div>
<hr class="mt-0 ">

<div class="container">
    <div class="row">
        <div class="col">
            <!-- informacja o usłudze/serwisie -->
            <h2>
                {{$service->name_service}}
            </h2>
            <dl class="row">
                <div class="col-4">Price service: </div>
                <div class="col-8">
                    {{$service->price_service}}
                </div>
                <div class="col-4">Type settlement: </div>
                <div class="col-8">
                    {{$service->type_settlement}}
                </div>
                <div class="col-4">Created at: </div>
                <div class="col-8">
                    {{$service->created_at}}
                </div>
            </dl>

        </div>
        <!-- end informacja o usłudze/serwisie -->
        <!-- Add payment -->
        <div class="col-8">
            <form action="{{action('paymentServiceController@store')}}" method="POST">
                {{ csrf_field()}}
                <input type="hidden" name="client_service_id" value="{{$clientService->id}}">

                <div class="card border-warning mb-3" style="max-width: 100%;">
                    <div class="card-header">Dodaj płatność <i class="far fa-credit-card"></i>
                        <b>

                        </b>
                    </div>
                    <div class="card-body text-info">
                        <!-- <h5 class="card-title">Info card title</h5> -->
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kwota płatności</label>
                            <input type="input" name="payment_amount" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Data płatności</label>
                            <input type="date" name="date_payment" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo date('Y-m-d'); ?>">

                        </div>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    </div>
                    <input type="submit" value="Dodaj płatność" class="btn btn-primary">
                </div>
            </form>
        </div>
        <!-- end add payment -->

        <table class="table table-hover ">
            <thead class="thead-default">
                <tr>
                    <th>Data płatności</th>
                    <th>Wpłata (zł)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                <tr>
                    <td scope="row">{{$payment->date_payment}}</td>
                    <td scope="row">{{$payment->payment_amount}}</td>
                   
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection