<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
    
        'img',
        'appartment_id'    
    ];

    public function appartment() {

        return $this -> belongsTo(Appartment::class);
    }
}
