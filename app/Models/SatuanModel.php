<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SatuanModel extends Model
{
    use HasFactory;

    protected $table = 'satuan';
    protected $primaryKey = 'id_satuan';

    public $timestamps = false;

    use SoftDeletes;

    public function barang()
    {
       
            return $this->hasMany(BarangModel::class, 'id_satuan', 'id_satuan');
        
        
    }
}
