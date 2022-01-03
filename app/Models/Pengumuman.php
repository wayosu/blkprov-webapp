<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengumuman extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['judul', 'isi', 'slug', 'user_id', 'gambar'];
    protected $table = 'pengumumans';

    protected $with = ['user'];
    
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%')
                            ->orWhere('isi', 'like', '%' . $search . '%');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
