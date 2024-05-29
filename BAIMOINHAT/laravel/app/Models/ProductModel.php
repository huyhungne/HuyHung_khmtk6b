<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model{
    use HasFactory;
    public $timestamps = false;

    protected $table = "tblProduct";

    public function hasOrderdetail()
    {
        return $this->hasMany(OrderModel::class, 'pid');
    }

}