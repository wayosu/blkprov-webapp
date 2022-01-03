<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['judul', 'category_id', 'konten', 'gambar', 'slug', 'user_id', 'status'];
    protected $with = ['category', 'user'];
    
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%')
                            ->orWhere('konten', 'like', '%' . $search . '%');
        });

        $query->when($filters['kategori'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
