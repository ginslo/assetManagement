<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\account;

class Account extends Model
{
  protected $fillable = ['name', 'crm_id'];

  public function user()
  {
    return $this->hasMany(User::class);
  }

  public function server()
  {
    return $this->hasMany(Server::class);
  }

  public function website()
  {
    return $this->hasMany(Website::class);
  }
}
