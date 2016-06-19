<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
  protected $fillable = ['name'];

  public function server()
  {
    return $this->hasMany(Server::class);
  }
}