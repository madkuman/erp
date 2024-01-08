<?php

namespace App\Models;

use App\Models\Barang;
use App\Models\Usulan;
use App\Models\UnitKerja;
use App\Models\PengadaanDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsulanDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
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

    public function pengadaan_detail()
    {
        return $this->hasOne(PengadaanDetail::class, 'usulan_detail_id');
    }
}
