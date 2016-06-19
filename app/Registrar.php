<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrar extends Model
{
  protected $fillable = ['name', 'crm_id'];
  
  public function domain_name()
  {
    return $this->hasMany(Domain_name::class);
  }
}
