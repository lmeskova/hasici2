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
        'name', 'email', 'password', 'district_id',
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

    const GROUP_ADMIN = 1;
    const GROUP_REGION_MANAGER = 2;
    const GROUP_DISTRICT_MANAGER = 3;
    const GROUP_MINISTER = 4;
    
    
    public function incidents()
  	{
  		return $this->hasMany('App\Incident', 'user_id');
  	}


    public function group()
    {
        return $this->belongsTo(UserGroup::class, 'group_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function isSuperAdmin()
    {
        return $this->group_id == User::GROUP_ADMIN;
    }

    public function isRegionManager()
    {
        return $this->group_id == User::GROUP_REGION_MANAGER;
    }

    public function isDistrictManager()
    {
        return $this->group_id == User::GROUP_DISTRICT_MANAGER;
    }
}
