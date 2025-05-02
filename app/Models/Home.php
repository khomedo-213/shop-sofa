<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Home extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'category ',
        'image',
        'description',
        'price',
        'sale_price'
    ];
}
