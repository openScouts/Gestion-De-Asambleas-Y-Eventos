<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NominaLogModel extends Model
{
    protected $table = 'nomina_log';

    public function relNomina()
    {
        return $this->hasOne(Nomina::class, 'id', 'nomina_id');
    }
}
