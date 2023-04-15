<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    public function kode1()
    {
        return $this->belongsTo(Quest::class, "kode_1");
    }

    public function gejala()
    {
        return $this->belongsTo(Quest::class, "gejala");
    }

    public function kode2()
    {
        return $this->belongsTo(Disease::class, "kode_2");
    }
    public function penyakit()
    {
        return $this->belongsTo(Disease::class, "penyakit");
    }

}
