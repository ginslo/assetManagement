<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
  public function product()
  {
    return $this->hasMany(Product::class);
  }
  public function server()
  {
    return $this->hasMany(Server::class);
  }
}
