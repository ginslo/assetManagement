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
    'distribution_id',
    'distribution_version_id',
    'kernel',
    'repo_update',
    'cores',
    'size',
    'memory',
    'user_id',
    'cost',
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

    public function distribution()
    {
      return $this->belongsTo(Distribution::class);
    }

    public function distribution_version()
    {
      return $this->belongsTo(Distribution_version::class);
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
