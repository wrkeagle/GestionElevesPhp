<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $fillable = [
        'nom', 'specialite'
    ];
    public function eleves() {
        return $this->hasMany(Eleve::class);
    }
    public function modules() {
        return $this->belongsToMany(Module::class);
    }
}
