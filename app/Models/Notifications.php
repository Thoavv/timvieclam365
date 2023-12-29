<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $table = 'notifications';

    protected $fillable = [
        'title', 'user_id', 'receiver_id', 'post_id', 'order_id', 'message', 'status','candidates_id','differentiate',
    ];
}
