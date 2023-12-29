<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'title', 'summary', 'content', 'image', 'job_typeid', 'detail_link', 'display_order', 'post_typeid','authorid','posting_date','closing_date','status','vacancy_count', 'address','homeflag', 'phone_number', 'end_date','like_pt',
    ];
}
