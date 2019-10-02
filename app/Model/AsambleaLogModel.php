<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AsambleaLogModel extends Model
{
    protected $table = 'asamblea_log';

    public function relNomina()
    {
        return $this->hasOne(Nomina::class, 'id', 'nomina_id');
    }
}
