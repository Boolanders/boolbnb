<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [

        'appartment_id'
    ];

    public function appartment() {

        return $this -> belogsTo(Appartment::class);
    }
}
