<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
  protected $fillable = [
    'user_id',
    'sku',
    'invoice_id',
    'status_id',
    'submit_date',
    'card_id',
    'payment_method',
    'settlement_date',
    'payment_amount',
    'settlement_amount',
    'recurring',
    'period_id',
    'subscriber_id',
    'transaction_id',
    'cost'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function invoice()
  {
    return $this->belongsTo(Invoice::class);
  }

  public function status()
  {
    return $this->belongsTo(Status::class);
  }

  public function card()
  {
    return $this->belongsTo(Card::class);
  }

  public function period()
  {
    return $this->belongsTo(Period::class);
  }

  public function subscription()
  {
    return $this->belongsTo(Subscription::class);
  }
}
