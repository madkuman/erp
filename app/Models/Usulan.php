<?php

namespace App\Models;

use App\Models\UnitKerja;
use App\Models\UsulanDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usulan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'usulan';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function unit_kerja()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_kerja_id');
    }

    public function usulan_detail()
    {
        return $this->hasMany(UsulanDetail::class, 'usulan_id');
    }

    public function jenis_usulan()
    {
        return $this->belongsTo(JenisUsulan::class, 'deskripsi');
    }

    /**
     * Get the user that owns the Usulan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
