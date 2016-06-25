<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
  protected $fillable = ['name','source_url'];

  public function server()
  {
    return $this->hasMany(Server::class);
  }

  public function Distribution_version()
  {
    return $this->belongsTo(Distribution_version::class);
  }
}
