<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'district_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $table = 'users';
  	public $timestamps = true;
  
  	use SoftDeletes;
  
  	protected $dates = ['deleted_at'];
    
    
    public function incidents()
  	{
  		return $this->hasMany('App\Incident', 'user_id');
  	}
}
