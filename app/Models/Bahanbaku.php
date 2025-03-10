<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahanbaku extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'deskripsi', 'satuan'];

    public function gudang()
    {
        return $this->hasOne(Gudang::class);
    }

    public function pencampurans()
    {
        return $this->hasMany(Pencampuran::class);
    }

    public function ekstraksis()
    {
        return $this->hasMany(Ekstraksi::class);
    }
}
