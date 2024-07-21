<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'firstname',
        'lastname',
        'country',
        'address',
        'town',
        'state',
        'postcode',
        'phonenumber',
        'email',
        'ordernote',
        'status',
        'tracking_no'
    ];
   
}
