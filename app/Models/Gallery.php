<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'cover',
        'slug',
        'user_id',
    ];

    protected $with = ['user'];
    
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                            ->orWhere('body', 'like', '%' . $search . '%');
        });
    }


    public function images() {
        return $this->hasMany(Image::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
