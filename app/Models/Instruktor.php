<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruktor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nip',
        'kejuruan_id',
        'tahun_diklat',
        'penempatan',
        'keterangan',
    ];

    public function kejuruan() {
        return $this->belongsTo(Kejuruan::class);
    }
}
