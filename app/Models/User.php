<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

 /**
 * The attributes that are mass assignable.
 *
 * @var array<int, string>
 */
protected $fillable = [
    // 'id_user',
    'id_role',
    'username',
    'password_user',
    'nama_user',
];
        
/**
 * The attributes that should be hidden for serialization.
 *
 * @var array<int, string>
 */
protected $hidden = [
    'password_user',
    'remember_token',
];

/**
 * The attributes that should be cast.
 *
 * @var array<string, string>
 */
protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed', // Gunakan 'password_user' jika ingin menggunakannya di sini
];
    protected $table = 'user_table';
    use SoftDeletes;
    public $timestamps = false;
    protected $primaryKey = 'id_user';

    public function role()
    {
        return $this->belongsTo(RoleModel::class, 'id_role','id_role');
    }

    public function pengadaan()
    {
        return $this->hasMany(PengadaanModel::class);
    }

    public function penjualan()
    {
        return $this->hasMany(PenjualanModel::class);
    }

    public function penerimaan()
    {
        return $this->hasMany(PenerimaanModel::class);
    }

    public function retur()
    {
        return $this->hasMany(ReturModel::class);
    }
    public function margin_penjualan()
    {
        return $this->hasMany(MarginPenjualanModel::class);
    }
}
