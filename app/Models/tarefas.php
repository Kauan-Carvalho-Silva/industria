<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tarefas extends Model
{
    protected $table = 'tarefas';

    protected $fillable = [
        'usuario_id',
        'descricao',
        'nome_setor',
        'prioridade',
        'data_cadastro',
        'status',
        'id_usuario'
    ];

    public $timestamps = true;

    public function usuario()
    {
        return $this->belongsTo(usuario::class, 'usuario_id');
    }
}