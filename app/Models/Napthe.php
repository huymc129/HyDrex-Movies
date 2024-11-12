<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Napthe extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'napthe';
    protected $fillable = [
        'request_id',
        'code',
        'partner_id',
        'serial',
        'telco',
        'command',
        'customer_id',
        'amount'

    ];
    public function customer(){
        return $this->belongsTo(Customers::class,'customer_id');
    }
}
