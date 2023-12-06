<?php

namespace App\Models;

use App\Models\smModel;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BagianModel extends Model
{
    use HasFactory;
    protected $table = 'tb_user';
    protected $primarykey = 'id';
    protected $fillable = [
        'nama_bagian','username','password','nama','tempat_lahir','tgl_lahir','alamat','no_hp','foto'
    ];
    public function suratmasukRelasi()
    {
        return $this->hasOne(smModel::class);
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
}
