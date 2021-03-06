<?php

namespace App\Http\Controllers;

use App\Client;
use App\Clientservice;
use App\Paymentservice;
// use App\Client;
use Illuminate\Http\Request;

class paymentServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo " index paymenServiceController";
        // return view('client_services.index');
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
        // cs_start_datefirst

        $paymentService = new Paymentservice;
        $paymentService->client_service_id = $request->get('client_service_id');
        $paymentService->payment_amount = $request->get('payment_amount');
        $paymentService->date_payment = $request->get('date_payment');
        $paymentService->is_paid = (int) 1;

        $dateStart = 'App\Clientservice'::where('id', $paymentService->client_service_id)->first();
        // $paymentService->date_period = $dateStart->cs_start_datefirst;
        $paymentService->date_period = $request->year . '-' . date('m-d', strtotime($dateStart->cs_start_datefirst));
        // return $paymentService->date_period;
        // $dayMonth =
        $paymentService->save();
        return redirect()->action('paymentServiceController@show', ['id' => $paymentService->client_service_id]);
    }

    //schowin expired for customerService id - middle table
    public function showExpiredPayment($idClientService)
    {
        $paymentService = new Paymentservice;
        return $paymentService->getExpiredPaymentCS($idClientService);

    }
    // show expired for one client
    public function showExpiredClient($clientId)
    {

        $expiredClient = new Paymentservice;
        return $expiredClient->getExpiredPaymentForClient($clientId);
    }
    //show all expired payment
    public function showExpiredAll()
    {
        

        $paymentService = new Paymentservice;
        $expiredAll = $paymentService->getExpiredAll();
        // dd($expiredAll);
        return view('payment_service.expired-payment', compact('expiredAll'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exPaiments = $this->showExpiredPayment($id);
        $payments = Paymentservice::where('client_service_id', $id)->get();
        $clientService = Clientservice::where('id', $id)->first();
        $client = Client::where('id', $clientService->client_id)->first();
        $service = 'App\Service'::where('id', $clientService->service_id)->first();
        return view('payment_service.show', compact('payments', 'client', 'service', 'clientService', 'exPaiments'));
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
