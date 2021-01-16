<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
  use Sluggable;

  /**
   * Return the sluggable configuration array for this model.
   *
   * @return array
   */
  public function sluggable()
  {
    return [
      'slug' => [
        'source' => 'title'
      ]
    ];
  }
  protected $fillable = [
    'title',
    'title_ru',
    'title_en',
    'slug',
    'category_id',
    'price',
    'article',
    'description',
    'status',
    'img'
  ];


  public function category()
  {
    return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
  }
}
