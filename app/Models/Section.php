<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected  $fillable = [

        'id',
        'section_name',
        'description',
    ];
    public function products()
    {

        return $this->hasMany(Product::class);
    }
}
