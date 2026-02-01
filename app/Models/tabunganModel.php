<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tabunganModel extends Model
{
    protected $table = 'tabungan';

    protected $fillable = [
        'nominal',
        'tanggal',
        'keterangan',
        'tipe'
    ];
}
