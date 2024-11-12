<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'customers';
    protected $fillable = [
        'name',
        'email',
        'password',
        'date_created',
        'status'
    ];
    public function customer_buy(){
        return $this->hasOne(CustomerBuy::class,'customer_id');
    }
    public function customer_balance(){
        return $this->hasOne(CustomerBalance::class,'customer_id');
    }
}
