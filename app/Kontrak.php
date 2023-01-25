<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    protected $fillable = [
        'pegawai_id',
        'jabatan_id',
        'gaji'


    ];

    public function pegawai() {
        return $this->belongsTo(Pegawai::class);

    }

    public function jabatan()
    {
        return $this->hasMany(Jabatan::class);
    }

}
