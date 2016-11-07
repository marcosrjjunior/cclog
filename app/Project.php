<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'name', 'owner',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'projects_users')->withTimestamps();
    }

    public function getFullNameAttribute()
    {
        return $this->owner.'/'.$this->name;
    }
}
