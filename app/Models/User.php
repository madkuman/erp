<?php

namespace App\Models;

use App\Models\SPK;
use App\Models\Usulan;
use App\Models\NotaDinas;
use App\Models\Pembelian;
use App\Models\Penawaran;
use App\Models\Penerimaan;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'username',
    //     'email',
    //     'password',
    // ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all of the usulan for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usulan()
    {
        return $this->hasMany(Usulan::class, 'created_by');
    }

    /**
     * Get all of the nota_dinas for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nota_dinas()
    {
        return $this->hasMany(NotaDinas::class, [
            'created_by', 'updated_by', 'deleted_by'
        ]);
    }
    /**
     * Get all of the nota_dinas for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penawaran()
    {
        return $this->hasMany(Penawaran::class, [
            'created_by', 'updated_by', 'deleted_by'
        ]);
    }

    public function spk()
    {
        return $this->hasMany(SPK::class, [
            'created_by', 'updated_by', 'deleted_by'
        ]);
    }

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, [
            'created_by', 'updated_by', 'deleted_by'
        ]);
    }

    public function penerimaan()
    {
        return $this->hasMany(Penerimaan::class, [
            'created_by', 'updated_by', 'deleted_by'
        ]);
    }

    public function uji_fungsi()
    {
        return $this->hasMany(UjiFungsi::class, [
            'created_by', 'updated_by', 'deleted_by'
        ]);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'created_by');
    }
}
