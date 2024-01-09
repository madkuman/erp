<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UjiFungsi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'uji_fungsi';
    protected $guarded = ['id'];

    public function usulan_detail()
    {
        return $this->belongsTo(UsulanDetail::class, 'usulan_detail_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
