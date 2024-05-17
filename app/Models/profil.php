<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profil extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // use HasFactory;
    protected $primaryKey = 'user_id';
    protected $table = 'profil';

    protected $fillable = [
        'user_id',
        'foto',
        'nama',
        'tujuan',
        'keuntungan',
        'link',
        'warna',
    ];
}
