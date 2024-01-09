<?php

namespace App\Models;

use App\Models\UsulanDetail;
use App\Models\Pembelian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Penerimaan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'penerimaan';
    protected $guarded = ['id'];

    public function usulan_detail()
    {
        return $this->belongsTo(UsulanDetail::class, 'usulan_detail_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class, 'pembelian_id', 'id');
    }
}
