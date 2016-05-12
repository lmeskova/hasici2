<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class, 'group_id');
    }
}
