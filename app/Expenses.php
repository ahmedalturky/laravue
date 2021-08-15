<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    // use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'amount','date', 'details'
    ];

}
