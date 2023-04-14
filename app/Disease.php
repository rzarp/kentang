<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    public function kode2()
    {
        return $this->hasMany(Knowledge::class, "kode_2");
    }
    
    public function penyakit()
    {
        return $this->hasMany(Knowledge::class, "penyakit");
    }

    public function jawaban()
    {
        return $this->hasMany(Konsultasi::class, "jawaban");
    }
}
