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

  public function Version()
  {
    return $this->belongsTo(Version::class);
  }
}
