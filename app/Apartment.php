<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [

        'description',
        'address',
        'room_qt',
        'bathroom_qt',
        'bed_qt',
        'mq',
        'visible',
        'latitude',
        'longitude',
        'user_id'
    ];

    public function messages() {

        return $this -> hasMany(Message::class);
    }

    public function images() {

        return $this -> hasMany(Image::class);
    }

    public function visits() {

        return $this -> hasMany(Visit::class);
    }

    public function user() {
        
        return $this -> belongsTo(User::class);
    }

    public function services() {
        
        return $this -> belongsToMany(Service::class);
    }

    public function sponsorships() {
        
        return $this -> belongsToMany(Sponsorship::class)
                        -> withPivot('start_date','end_date');
    }

}
