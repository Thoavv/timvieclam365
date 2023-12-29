<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageStorage extends Model
{
    protected $table = 'package_storage';

    protected $fillable = [
        'package_name',
        'price',
        'duration',
        'description',
        'status',
        'homeflag',
    ];
}
