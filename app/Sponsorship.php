<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $fillable = [
        'price',
        'hours'
    ];

    public function apartments(){
        $this -> belongsToMany(Apartment::class)
                -> withPivot('start_date','end_date');
    }
}
