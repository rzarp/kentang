<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    public function kode1()
    {
        return $this->hasMany(Knowledge::class, "kode_1");
    }
    public function gejala()
    {
        return $this->hasMany(Knowledge::class, "gejala");
    }

    public function pertanyaan()
    {
        return $this->hasMany(Konsultasi::class, "pertanyaan");
    }
    
}
