<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telpon extends Model
{
    protected $table = 'telpons';
    protected $primaryKey = 'id_siswa';
    protected $fillable = ['id_siswa', 'nomor_telepon'];

    public function siswa() {
        return $this->belongsTo('App\Siswa', 'id_siswa');
    }
}
