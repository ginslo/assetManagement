<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_item extends Model
{
  public function invoice()
  {
    return $this->hasMany(Invoice::class);
  }

  public function product()
  {
    return $this->belongsTo(Product::class);
  }
}
