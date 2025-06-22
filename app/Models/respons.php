<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class respons extends Model
{
    use HasFactory;

    protected $table = 'resti_respons';


    protected $fillable = [
        'id_complain',
        'respon',
    ];

    public function complain()
    {
        return $this->belongsTo(Complain::class, 'complain_id');
    }
}
