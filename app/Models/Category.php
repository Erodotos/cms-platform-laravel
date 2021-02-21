<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    public function posix_strerror()
    {
        return $this->belongsToMany(Post::class);
    }
}
