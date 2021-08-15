<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodect extends Model
{
    protected $fillable = [
        'name', 'company','date', 'price','Details'
    ];
    public function orders()
    {
        return $this->hasMany('App\Orders');
    }
}
