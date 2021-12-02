<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'gallery_id',
    ];

    public function galleries() {
        return $this->belongsTo(Gallery::class);
    }
}
