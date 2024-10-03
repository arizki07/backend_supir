<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kartupengecekan extends Model
{
    use HasFactory;
    protected $table = 'kartupengecekan';
    protected $fillable = [
        'idmuat',
        'tanggal',
        'nopol',
        'security',
        'checker',
        'driver1',
        'driver2',
        'forklift1',
        'forklift2',
        'jammuat',
        'jamselesai',
        'personel1',
        'personel2',
        'personel3',
        'personel4',
        'totbale',
    ];
}
