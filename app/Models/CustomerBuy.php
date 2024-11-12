<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBuy extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'customer_buys';
    protected $fillable = [
        'title',
        'customer_id',
        'package_id',
        'date_created',
        'date_expired',
        'status'
    ];
}
