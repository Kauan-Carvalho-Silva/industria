<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdemProducao extends Model
{
    protected $table = 'ordens_producao';

    protected $fillable = [
        'setor_id',
        'responsavel_id',
        'codigo_ordem',
        'produto',
        'quantidade_planejada',
        'quantidade_produzida',
        'data_inicio',
        'data_fim',
        'status',
        'observacoes'
    ];

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }

    public function responsavel()
    {
        return $this->belongsTo(Funcionario::class, 'responsavel_id');
    }
}