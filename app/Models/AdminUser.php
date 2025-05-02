<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminUser extends Model
{

    use SoftDeletes;

    protected $table = 'users';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'role',
    ];
}
