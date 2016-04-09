<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaJogos extends Model
{
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'id', 'pessoa_id');
    }

    public function jogo()
    {
        return $this->belongsTo(Pessoa::class, 'id', 'jogo_id');
    }
}
