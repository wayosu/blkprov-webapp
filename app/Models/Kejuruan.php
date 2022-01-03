<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kejuruan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'gambar',
        'deskripsi',
        'slug',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%')
                            ->orWhere('deskripsi', 'like', '%' . $search . '%');
        });
    }

    public function subkejuruan() {
        return $this->hasMany(SubKejuruan::class);
    }

    public function instruktor() {
        return $this->hasMany(Instruktor::class);
    }
}
