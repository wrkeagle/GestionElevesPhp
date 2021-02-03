<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $fillable = [
        'nom', 'prenom', 'email','promo_id'
    ];
    public function promo() {
        return $this->belongsTo(Promo::class);
    }
}
