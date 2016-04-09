<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{

    public $table = 'pessoa';

    /**
     * @property integer $id
     * @property string $nome
     * @property string $endereco_completo
     * @property string $email
     */

    public function jogos()
    {
        return $this->hasMany(PessoaJogos::class, 'pessoa_id', 'id');
    }
}
