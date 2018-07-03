<?php

namespace App\Http\Controllers;

use App\Client;
use App\Service;
use App\Paymentservice;
use App\Clientservice;
use Illuminate\Http\Request;
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;



class ClientServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "tesT index";
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //pobieramy usera
        $client = Client::find($request->client_id);
        //znajdujemy jegp id

        $client->services()->attach($request->service_id, ['cs_start_datefirst' => $request->cs_start_datefirst, 'cs_start_active' => '1']);
  
        return redirect()->route('clientServices', ['id' => $request->client_id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Paymentservice = new Paymentservice();
        $ExpiredPaymentForClient = $Paymentservice->showExpiredClient($id);
        dd($ExpiredPaymentForClient);
        $Client = Client::find($id);
        $clientServices = Client::find($id)->services;
        $Services = Service::all();
        return view('client_services.index', compact('clientServices', 'Client', 'Services'));

    }
 
    public function show_payment_details($id)
    {
        return view('client_services.show_payment_details');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
