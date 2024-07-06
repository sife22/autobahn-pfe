<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'matricule';
    public $incrementing = false;


    public function reservation(){
        return $this->hasMany(Reservation::class);
    }
}
