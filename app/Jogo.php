<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    public function pessoas()
    {
        return $this->hasMany(PessoaJogos::class, 'jogo_id', 'id');
    }
}
