<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprunt extends Model
{
    protected $fillable = [
        'user_id',
        'livre_id',
        'date_emprunt',
        'date_retour',
    ];

    protected $casts = [
        'date_emprunt' => 'date',
        'date_retour'  => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function livre()
    {
        return $this->belongsTo(Livre::class);
    }
}