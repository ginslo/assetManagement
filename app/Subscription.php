<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function period()
  {
    return $this->belongsTo(Period::class);
  }

  public function invoice()
  {
    return $this->belongsTo(Invoice::class);
  }

  public function transaction()
  {
    return $this->belongsTo(Transaction::class);
  }

}
