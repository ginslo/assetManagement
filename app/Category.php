<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = ['name', 'slug','description','short_description','meta_title','meta_keywords','meta_description','status','searchable'];

  public function product()
  {
    return $this->hasMany(Product::class);
  }
}
