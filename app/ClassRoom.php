<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    //
    protected $fillable = [
        'name',
        'slug',
        'section',
        'subject',
        'room',
        'user_id'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
