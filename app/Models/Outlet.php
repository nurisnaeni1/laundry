<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outlet extends Model
{
    use HasFactory;

    protected $table = 'outlet';
    protected $fillable = [
        'nama_outlet',
        'alamat_outlet',
        'tlp_outlet',
    ];

    protected $hidden = [];

    public function paket(){
        return $this->hasMany(Paket::class, 'id_outlet');
    }
}
