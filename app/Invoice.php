<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  protected $fillable = ['user_id', 'invoice_date', 'memo'];
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function transaction()
  {
    return $this->belongsTo(Transaction::class);
  }

  public function product()
  {
    return $this->belongsTo(Product::class);
  }

  public function invoice_item()
  {
    return $this->belongsTo(Invoice_item::class);
  }
}
