<?php

namespace App;

use App\Clientservice;
use App\Paymentservice;
use Illuminate\Database\Eloquent\Model;
use DB;
class Paymentservice extends Model
{

    private $yearStart;
    private $monthDay;
    private $yearNow;
    private $expiredPayment;
    private $DateCheck;
    // private $bunchNotPayment;
    private $id_service;
    private $allExpiredPayment;

    // public function getExpiredPaymentForClient($clientId)
    // {
    //     // Get all middle CS for client_id =>return id(client_service)
    //     $idClientService = Clientservice::where('client_id', $clientId)->pluck('id','service_id');
    //     foreach ($idClientService as $idCS) {
    //         $paymentService['Cid'][$clientId][$idCS] =  $this->getExpiredPaymentCS($idCS);
    //     }
    //     // $paymentService = "123";
    //     return $paymentService;

    // }

    public function getExpiredPaymentForClient($clientId)
    {

        //Get all middle CS for client_id =>return id(client_service)
        $idCS = Clientservice::where('client_id', $clientId)->pluck('id');
        $client = Client::where('id', $clientId)->first();
        $ExpiredPaymentClient = collect([]);
        // dd($idCS);
        foreach ($idCS as $id) {
            $service = DB::table('client_service')
                ->join('services', 'client_service.service_id', '=', 'services.id')
                ->select('services.*')
                ->first();
            // dd($service);

            $ExpiredPaymentClient->push([
                "id_client" => $client->id,
                "name_client" => $client->name_client,
                "idCS" => $id,
                "name_service" => $service->name_service,
                "expired-year" => $this->getExpiredPaymentCS($id),
            ]);
            // $paymentService[$clientId][$id] = $client;
        }
        // dd($ExpiredPaymentClient);
        return $ExpiredPaymentClient;
    }

    //get expired payments for midletable client_service
    public function getExpiredPaymentCS($idCS)
    {

        // #Pobierz najpierw datę Pierwszej płatności - inicjalizacji
        $ClientService = new Clientservice;
        $CSStartDateFirst = 'App\Clientservice'::where('id', $idCS)->first();
        //W przypadku rocznego okresu rozliczeniowego pobierz rok
        (int) $this->yearStart = date('Y', strtotime($CSStartDateFirst->cs_start_datefirst));
        //Get month and day
        $this->monthDay = date('m-d', strtotime($CSStartDateFirst->cs_start_datefirst));
        //get the year from the current date
        (int) $this->yearNow = date('Y');
        // return $CSStartDateFirst->service_id;

        $this->id_service = $CSStartDateFirst->service_id;

        //collect
        $this->expiredPayment = collect([]);

        for ($i = $this->yearStart; $i <= $this->yearNow; $i++) {
            // echo('<br>'.$i.'<br>');

            $this->DateCheck = $i . '-' . $this->monthDay;
            // echo $this->DateCheck;

            $testPayment = 'App\Paymentservice'::where('client_service_id', $idCS)->where('date_period', $this->DateCheck)->get();
            // $testPayment = 'App\Paymentservice'::where('client_service_id', $idCS)->get();

            if ($testPayment->count() <= 0) {
                $this->expiredPayment->push(["service_id" => $this->id_service, "Expired year" => (int) $i]);
                $testArray[] = (int) $i;
                // $CollectExpiredPayment->push((int)$i, $this->id_service );
                // echo "nie ma płatnosci <br>";

            } else {
                // echo"jest płatnosć <br>";
            }
        }
        // dd($this->expiredPayment);
        return $testArray;
        // return $this->expiredPayment;

    }

    public function getExpiredAll()
    {
        //get all client id
        $ClientAllId = Client::all()->pluck('id');
        // dd($ClientAllId);
        $this->allExpiredPayment = collect([]);
        foreach ($ClientAllId as $CALLId) {
            // echo $CALLId;
            $this->allExpiredPayment->push($this->getExpiredPaymentForClient($CALLId));
        }
        // dd($this->allExpiredPayment);

        $multiplied = $this->allExpiredPayment->map(function ($item) {
            return $item;

        });

        return $multiplied->flatten(1);

        // return $this->allExpiredPayment;
    }

    public function addPayment($client_service_id, $payment_amount, $date_period, $date_payment)
    {

    }
}
