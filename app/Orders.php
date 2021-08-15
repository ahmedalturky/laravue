<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'clint_name', 'clint_address','clint_phone', 'date','glass_type',
        'D_R_SPH','D_R_SYL','D_R_AXIS','D_L_SPH','D_L_SYL','D_L_AXIS',
        'N_R_SPH','N_R_SYL','N_R_AXIS','N_L_SPH','N_L_SYL','N_L_AXIS',
        'IPD', 'plase','prodect_id', 'prise','discount','amount_after','payed','amount_left','date','note','order_type',
    ];

    public function prodect()
    {
        return $this->belongsTo('App\Prodect');
    }

}
