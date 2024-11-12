<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPackage extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'customer_packages';
    protected $fillable = [
        'title',
        'description',
        'status',
        'price',
        'date_package'
    ];
}
