<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;

    protected $fillable = ['obat_id', 'bahanbaku_id', 'jumlah', 'tanggal_kadaluarsa'];

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }

    public function bahanbaku()
    {
        return $this->belongsTo(Bahanbaku::class);
    }
}
