<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'email',
        'crm_id',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function server()
    // {
    //   return $this->belongsTo('App\Server');
    // }
    public function company()
    {
      return $this->belongsTo(Company::class);
    }

    public function domain_name()
    {
      return $this->hasMany(Domain_name::class);
    }

    public function server()
    {
      return $this->hasMany(Server::class);
    }

    public function website()
    {
      return $this->hasMany(Website::class);
    }

    public function getFullNameAttribute()
    {
      return $this->first_name . " " . $this->last_name;
    }
}
