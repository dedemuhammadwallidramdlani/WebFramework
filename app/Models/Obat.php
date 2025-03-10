<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obats'; 
    protected $fillable = [ 
        'nama_obat',
        'deskripsi',
        'stok',
        'harga',
    ];

public function gudangs()
{
    return $this->hasOne(Gudang::class);
}

public function pencampurans()
{
    return $this->hasMany(Pencampuran::class);
}

public function transaksis()
{
    return $this->hasMany(Transaksi::class);
}

}