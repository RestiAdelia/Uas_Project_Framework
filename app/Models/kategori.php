<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
     use HasFactory;

    protected $table = 'resti_categories';
    protected $fillable = ['nama_kategori'];

    public function complains()
    {
        return $this->hasMany(Complain::class, 'kategori_id');
    }

}
