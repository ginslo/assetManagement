<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
  protected $fillable = ['name', 'source_url'];

  public function website()
  {
    return $this->hasMany(Website::class);
  }
}
