<?php

namespace App\Repositories\Admin;

use App\Models\Product as Model;
use App\Repositories\CoreRepository;
use DB;


class ProductRepository extends CoreRepository
{
    /**
     * @return mixed
     */
    protected function getModelClass()
    {
        return Model::class;

    }

  // все пользователи без пагинации тольк id  role
  public function  getAllProducts()
  {
    $products = $this->startConditions()
      ->join('product_categories','product_categories.id', '=', 'products.category_id')
      ->select(
        'products.id',
        'products.title',
        'products.price',
        'products.article',
        'products.status',
        'products.description',
        'products.img',
        'product_categories.title as category')
      ->orderBy('id')
      ->toBase()
      ->get();

    return $products;
  }


}
