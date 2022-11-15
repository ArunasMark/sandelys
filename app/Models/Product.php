<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable=['name', 'quantity', 'price', 'warehouse_id'];




    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }
}
