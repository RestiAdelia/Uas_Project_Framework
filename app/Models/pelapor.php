<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pelapor extends Model
{
     protected $table = 'resti_pelapor'; // sesuaikan dengan nama tabel kamu

    protected $fillable = [
        'nama',
        'nik',
        'telepon',
    ];

    public function complains()
    {
        return $this->hasMany(Complain::class, 'id_pelapor');
    }
}
