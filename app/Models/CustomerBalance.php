<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBalance extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'customer_balance';
    protected $fillable = [
        'balance',
        'date_created',
        'customer_id'
    ];
}
