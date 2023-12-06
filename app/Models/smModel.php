<?php

namespace App\Models;

use App\Models\BagianModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class smModel extends Model
{
    use HasFactory;
    protected $table = 'tb_sm';
    protected $primarykey = 'id';
    protected $fillable = [
        'no_surat','no_index','tgl_surat','tgl_diterima','pengirim','perihal','lampiran','sifat','file','catatan','catatan_camat','catatan_bagian','bagian_id','tgl_disposisi','tgl_arsip','aktivitas'
    ];
    public function bagianRelasi()
    {
        return $this->belongsTo(BagianModel::class, 'bagian_id', 'id');
    }
}
