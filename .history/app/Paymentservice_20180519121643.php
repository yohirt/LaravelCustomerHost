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
    
    public function getExpiredPaymentCS($idCS)
    {
        // #Pobierz najpierw datę Pierwszej płatności - inicjalizacji
        $ClientService = new Clientservice;
        echo("<br> $idCS");
        $CSStartDateFirst =  'App\Clientservice'::where('id', $idCS)->first();
        //W przypadku rocznego okresu rozliczeniowego pobierz rok
        (int)$this->yearStart = date('Y', strtotime($CSStartDateFirst->cs_start_datefirst) );
        $this->monthDay = date('m-d', strtotime($CSStartDateFirst->cs_start_datefirst) );
        //get the year from the current date
        (int)$this->yearNow = date('Y');

        for ($i= $this->yearStart; $i <= $this->yearNow ; $i++) { 
            echo('<br>'.$i.'<br>');
            
            $this->DateCheck = $i.'-'.$this->monthDay;
            // echo $this->DateCheck;
          
            // $testPayment = 'App\Paymentservice'::where('client_service_id', $idCS)->where('date_period', $this->DateCheck)->get();
            $testPayment = 'App\Paymentservice'::where('client_service_id', $idCS)->get();



            if($testPayment->count() <= 0 ){
                $this->expiredPayment[] = 'App\Paymentservice'::where('client_service_id', $idCS)->where('date_period',$this->DateCheck)->get();
                echo "nie ma płatnosci <br>";

                var_dump( $this->expiredPayment);

            }else{
                echo"jest płatnosć <br>";
            }
        } 

        // return $this->expiredPayment;

        // dd($expiredPayment);
        

        // Ziteuj rok
        //     sprawdź czy była wykonana płatność :
        //         czyli sprawdź date_period z wygenerowanym nowym rokiem
                

    }

    public function addPayment($client_service_id, $payment_amount, $date_period, $date_payment){

    }
}


