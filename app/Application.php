<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
  protected $fillable = ['name', 'slug', 'summary', 'description', 'source_url'];

  public function website()
  {
    return $this->hasMany(Website::class);
  }
}
