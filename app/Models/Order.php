<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'phone',
        'payment_type',
    ];
    public function order_details(){

        return $this->hasMany(OrderDetail::class);
    }
}
