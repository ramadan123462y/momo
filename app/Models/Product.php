<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'Product_name',
        'trade_Name',
        'description',
        'purchasing_price',
        'selling_price',
        'mount',
        'notification_mount',
        'unite_id',
        'section_id',
        'place',
    ];
    public function section()
    {

        return $this->belongsTo(Section::class,);
    }
    public function unite()
    {

        return $this->belongsTo(Unite::class);
    }
}
