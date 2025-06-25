<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complain extends Model
{
    use HasFactory;

    protected $table = 'resti_complaints'; // HARUSNYA ini


    protected $fillable = ['id_pelapor', 'kategori_id', 'judul', 'deskripsi', 'status'];

    public function complain()
    {
        return $this->belongsTo(Complain::class, 'complain_id');
    }


    public function pelapor()
    {
        return $this->belongsTo(Pelapor::class, 'id_pelapor');
    }

    public function respon()
    {
        return $this->hasOne(respons::class, 'complain_id');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function responses()
{
    return $this->hasMany(Respons::class, 'complain_id');
}
}
