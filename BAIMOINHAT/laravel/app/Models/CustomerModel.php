<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    use HasFactory;
}
class OrderDetailModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "tblorderdetail";

    public function hasOrderDetail()
    {
        // Giả sử 'pid' là khóa ngoại trong OrderDetailModel tham chiếu đến ProductModel
        return $this->belongsTo(OrderModel::class, 'oid', 'odid');
    }
    public function belongtoProduct()
    {
        // Giả sử 'pid' là khóa ngoại trong OrderDetailModel tham chiếu đến ProductModel
        return $this->belongsTo(ProductModel::class, 'pid', 'odid');
    }
}
