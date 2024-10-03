<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuPengecekanItm extends Model
{
    use HasFactory;
    protected $table = 'kartupengecekanitm';
    protected $fillable = [
        'id_muat',
        'tujuan',
        'nama',
        'lot',
        'jenis',
        'val_jenis',
        'bale',
        'cones',
        'dibuat',
    ];
}
