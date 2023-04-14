<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{

    public function pertanyaan()
    {
        return $this->belongsTo(Quest::class, "pertanyaan");
    }
    public function jawaban()
    {
        return $this->belongsTo(Disease::class, "jawaban");
    }
}
