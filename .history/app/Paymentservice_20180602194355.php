<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Clientservice;
use App\Paymentservice;

class Paymentservice extends Model
{
    
    private $yearStart;
    private $monthDay;
    private $yearNow;
    private $expiredPayment = array();
    private $DateCheck;
    // private $bunchNotPayment;
    private $id_service;
    

    public function showExpiredPaymentForClient($clientId)
    {
        // Get all middle CS for client_id =>return id(client_service)
        $idClientService = Clientservice::where('client_id', $clientId)->pluck('id','service_id');
        foreach ($idClientService as $idCS) {
            $paymentService[$clientId][$idCS] =  $this->getExpiredPaymentCS($idCS);
        }
        // $paymentService = "123";
        return $paymentService;

    }    

    //get expired payments for midletable client_service
    public function getExpiredPaymentCS($idCS)
    {
        
        // #Pobierz najpierw datę Pierwszej płatności - inicjalizacji
        $ClientService = new Clientservice;
        $CSStartDateFirst =  'App\Clientservice'::where('id', $idCS)->first();
        //W przypadku rocznego okresu rozliczeniowego pobierz rok
        (int)$this->yearStart = date('Y', strtotime($CSStartDateFirst->cs_start_datefirst) );
        //Get month and day
        $this->monthDay = date('m-d', strtotime($CSStartDateFirst->cs_start_datefirst) );
        //get the year from the current date
        (int)$this->yearNow = date('Y');
        // return $CSStartDateFirst->service_id;

        $this->id_service = $CSStartDateFirst->service_id;

        for ($i= $this->yearStart; $i <= $this->yearNow ; $i++) { 
            // echo('<br>'.$i.'<br>');
            
            $this->DateCheck = $i.'-'.$this->monthDay;
            // echo $this->DateCheck;
          
            $testPayment = 'App\Paymentservice'::where('client_service_id', $idCS)->where('date_period', $this->DateCheck)->get();
            // $testPayment = 'App\Paymentservice'::where('client_service_id', $idCS)->get();

            if($testPayment->count() <= 0 ){
                $this->expiredPayment[$this->id_service][] = (int)$i;
                // echo "nie ma płatnosci <br>";

                
            }else{
                // echo"jest płatnosć <br>";
            }
        } 
        // dd($this->expiredPayment);
        return $this->expiredPayment;

    }

    public function addPayment($client_service_id, $payment_amount, $date_period, $date_payment){

    }
}


