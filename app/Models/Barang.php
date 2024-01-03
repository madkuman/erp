<?php

namespace App\Models;

use App\Models\KodeRekening;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'barang';
    protected $primaryKey = "id";
    protected $fillable = ['kode_rekening_id', 'nama', 'satuan', 'harga', 'tipe', 'kelompok', 'created_by', 'updated_by', 'deleted_by'];

    public function kodeRekening()
    {
        return $this->belongsTo(KodeRekening::class);
    }

    public function usulan_detail()
    {
        return $this->hasMany(UsulanDetail::class, 'barang_id');
    }
}
