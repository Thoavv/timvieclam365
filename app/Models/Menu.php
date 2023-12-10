<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = [
        'IsActive', 'MenuName', 'ControllerName', 'Levels', 'ParentID', 'MenuOrder', 'Position', 'Link',
    ];
}
