<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengumuman extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['judul', 'isi', 'slug', 'user_id'];
    protected $table = 'pengumumans';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
