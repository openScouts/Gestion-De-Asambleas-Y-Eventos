<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OradoresModel extends Model
{
    protected $table = 'oradores';
    use SoftDeletes;

    public function relNomina()
    {
        return $this->hasOne(NominaModel::class, 'id', 'nomina_id');
    }
}
