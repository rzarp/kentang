<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    public function q_parent()
    {
        return $this->hasOne(Quest::class, 'id',"parent");
    }

    public function q_quest()
    {
        return $this->hasOne(Quest::class, 'id',"quest");
    }

    public function q_yes()
    {
        return $this->hasOne(Quest::class, 'id',"yes");
    }

    public function q_no()
    {
        return $this->hasOne(Quest::class, 'id',"no");
    }

    public function d_hipotesa()
    {
        return $this->hasOne(Disease::class, 'id', 'hipotesa');
    }
}
