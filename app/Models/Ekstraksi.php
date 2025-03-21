<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstraksi extends Model
{
    use HasFactory;

    protected $fillable = ['bahanbaku_id', 'hasil_ekstraksi', 'satuan_hasil', 'tanggal_ekstraksi'];

    public function bahanbaku()
    {
        return $this->belongsTo(Bahanbaku::class);
    }
}
