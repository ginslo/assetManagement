<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain_name extends Model
{
  protected $fillable = ['name', 'registrar_id','user_id','creation_date','expiration_date','price','cost'];

  public function registrar()
  {
    return $this->belongsTo(Registrar::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function website()
  {
    return $this->hasMany(Website::class);
  }

}
