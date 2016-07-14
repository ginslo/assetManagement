<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public function transaction()
    {
      return $this->hasMany(Transaction::class);
    }
}
