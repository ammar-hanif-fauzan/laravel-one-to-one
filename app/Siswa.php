<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $fillable = [
        'id',
        'nama_siswa',
    ];

    public function telepon() {
        // PARAMETER PERTAMA MODEL YANG DITENTUKAN, PARAMETER KEDUA NAMA ID YANG DICOCOKKAN.
        return $this->hasOne('App\Telpon', 'id_siswa'); 
    }
}
