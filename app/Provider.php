<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
  protected $fillable = ['name', 'crm_id'];

  public function data_center()
  {
    return $this->hasMany(Data_center::class);
  }

  public function server()
  {
    return $this->hasMany(Server::class);
  }
}
