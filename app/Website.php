<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
  protected $fillable = [
    'name',
    'subdomain',
    'domain_name_id',
    'user_id',
    'server_id',
    'application_id',
    'bugtracker_name',
    'ci_name'
  ];

  public function domain_name()
  {
    return $this->belongsTo(Domain_name::class);
  }

  public function application()
  {
    return $this->belongsTo(Application::class);
  }

  public function server()
  {
    return $this->belongsTo(Server::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  // public function company()
  // {
  //   return $this->belongsTo(Company::class);
  // }
}
