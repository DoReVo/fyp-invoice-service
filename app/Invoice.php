<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';

    public $timestamps = false;

    protected $casts = [
        'payment_id' => 'integer',
    ];
}
