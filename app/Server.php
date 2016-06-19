<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
  protected $fillable = [
    'name',
    'provider_id',
    'data_center_id',
    'state',
    'hostname',
    'instance_id',
    'purpose_id',
    'ip_public',
    'ip_private',
    'os_id',
    'os_version_id',
    'kernel',
    'repo_update',
    'cores',
    'size',
    'memory',
    'user_id',
    'price'
  ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function account()
    {
      return $this->belongsTo(Account::class);
    }

    public function provider()
    {
      return $this->belongsTo(Provider::class);
    }

    public function data_center()
    {
      return $this->belongsTo(Data_center::class);
    }

    public function purpose()
    {
      return $this->belongsTo(Purpose::class);
    }

    public function os()
    {
      return $this->belongsTo(Os::class);
    }

    public function os_version()
    {
      return $this->belongsTo(Os_version::class);
    }

    public function website()
    {
      return $this->hasMany(Website::class);
    }

    public function ssh_key()
    {
      return $this->hasMany(Ssh_key::class);
    }
}
