<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Os extends Model
{
  protected $fillable = ['name','source_url'];

  public function server()
  {
    return $this->hasMany(Server::class);
  }

  public function os_version()
  {
    return $this->belongsTo(Os_version::class);
  }
}
