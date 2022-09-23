<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'tabla_ventas';


    public function user()
    {
        return $this->belongsTo('App\User','for_users_id','id');
    }

    public function dms()
    {
        return $this->belongsTo('App\Dms','tabla_dms_idpdv','idpdv');
    }
 public function cliente()
    {
        return $this->belongsTo('App\Cliente','cliente_idpdv','idpdv');
    }
   

}
