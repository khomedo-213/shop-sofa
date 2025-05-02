<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminProduct extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'categories_id',
        'image',
        'description',
        'price',
        'saleprice'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

}
