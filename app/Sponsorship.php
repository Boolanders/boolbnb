<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $fillable = [
        'price',
        'description',
        'hours'
    ];

    public function apartments(){
        $this -> belongsToMany(Apartment::class);
    }
}
