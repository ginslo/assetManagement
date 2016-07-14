<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = ['name', 'slug', 'summary', 'description', 'category_id', 'source_url', 'sku', 'meta_title', 'meta_keywords', 'meta_description', 'status', 'searchable', 'cost', 'price', 'recurring', 'period_id'];

  public function website()
  {
    return $this->hasMany(Website::class);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function period()
  {
    return $this->belongsTo(Period::class);
  }

  public function invoice()
  {
    return $this->hasMany(Invoice::class);
  }

  public function invoice_item()
  {
    return $this->belongsTo(Invoice_item::class);
  }
}
