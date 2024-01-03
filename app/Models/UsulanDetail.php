<?php

namespace App\Models;

use App\Models\Usulan;
use App\Models\UnitKerja;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsulanDetail extends Model
{
    use HasFactory;
    protected $table = 'usulan_detail';
    protected $guarded = ['id'];

    public function usulan()
    {
        return $this->belongsTo(Usulan::class, 'usulan_id');
    }

    public function unit_kerja()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_kerja_id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
