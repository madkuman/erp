<?php

namespace App\Models;

use App\Models\Usulan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnitKerja extends Model
{
    protected $table = 'unit_kerja';
    protected $guarded = ['id'];

    public function usulan()
    {
        return $this->hasMany(Usulan::class, 'unit_kerja_id');
    }
}
