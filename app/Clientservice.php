<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientservice extends Model
{
    protected $table ='client_service';
    public function Paymentservice()
    {
        return $this->hasMany('App\Paymentservice');
    }
}
