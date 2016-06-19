<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Os_version extends Model
{
  protected $fillable = ['name', 'os_id'];

  public function server()
  {
    return $this->hasMany(Server::class);
  }

  public function os()
  {
    return $this->belongsTo(Os::class);
  }
}
