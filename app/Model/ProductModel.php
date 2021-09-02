<?php

namespace App\Model;

use App\PesananMitra;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductModel extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_product';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'category_id',
        'product_name',
        'product_bpom',
        'product_image',
        'product_price',
        'product_netto',
        'product_unit_netto',
        'product_weight',
        'product_unit',
        'product_desk',
        'product_status',
        'product_slug',
        "product_type"
    ];

    public function pesananMitra() {
        return $this->hasMany(PesananMitra::class, "product_id");
    }

}
