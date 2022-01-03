<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKejuruan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kurikulum',
        'image',
        'kejuruan_id',
        'slug',
    ];

    public function kejuruans() {
        return $this->belongsTo(Kejuruan::class);
    }
}
