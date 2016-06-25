<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribution_version extends Model
{
  protected $fillable = ['name', 'distribution_id'];

  public function server()
  {
    return $this->hasMany(Server::class);
  }

  public function distribution()
  {
    return $this->belongsTo(Distribution::class);
  }
}
