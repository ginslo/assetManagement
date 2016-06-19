<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ssh_key extends Model
{
  protected $fillable = ['name', 'ssh_key', 'user_id'];

  public function server()
  {
    return $this->hasMany(Server::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
