<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skModel extends Model
{
    use HasFactory;
    protected $table = 'tb_sk';
    protected $primarykey = 'id';
    protected $fillable = [
        'no_surat','tgl_surat','kepada','perihal','lampiran','sifat','isi_surat','catatan','tgl_arsip','ttd','aktivitas'
    ];
}
