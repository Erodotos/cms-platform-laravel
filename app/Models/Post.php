<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at', 'publish_at'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
