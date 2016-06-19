<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_center extends Model
{
  protected $fillable = ['name', 'provider_id'];

  public function provider()
  {
    return $this->belongsTo(Provider::class);
  }

  public function server()
  {
    return $this->hasMany(Server::class);
  }
}
