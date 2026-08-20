<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Equipamento;

class Equipamento extends Model
{
    protected $table = 'equipamentos';
    protected $fillable = ['nome', 'patrimonio',
        'setor_id', 'status'];

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }
}
