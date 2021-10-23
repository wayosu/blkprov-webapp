<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'category_id', 'konten', 'gambar', 'slug'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
