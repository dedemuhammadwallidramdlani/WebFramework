<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencampuran extends Model
{
    use HasFactory;

    protected $fillable = ['obat_id', 'bahanbaku_id', 'jumlah_bahanbaku', 'tanggal_pencampuran'];

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }

    public function bahanbaku()
    {
        return $this->belongsTo(Bahanbaku::class);
    }
}
