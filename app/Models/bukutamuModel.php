<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bukutamuModel extends Model
{
    use HasFactory;
    protected $table = 'tb_buku_tamu';
    protected $primarykey = 'id';
    protected $fillable = [
        'nama','alamat','maksud_kunjungan','tanggal','jabatan'
    ];
}
