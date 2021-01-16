<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\If_;

class ProductCategoryController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = ProductCategory::select(['title', 'img', 'slug', 'id'])->get();;
        return view('admin.shop.categories.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $item = ProductCategory::make();
      return view('admin.shop.categories.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'title' => 'required',
      ]);

      $data = $request->input();
      if (($request['img'])){
        $folder = 'products/'. date('Y') . '/'. date('m');

        $data['img'] = $request->file('img')->store('images/'. $folder);

      }
      $item = ProductCategory::create($data);
      if ($item){
        return redirect()->route('admin.product_categories.index')->with('success', 'Категория добавлена');
      }

      return back()->withErrors(['msg' => __('admin.error_save')]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = ProductCategory::find($id);
      return view('admin.shop.categories.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'title' => 'required',
      ]);

      $data = $request->input();
      if (($request['img'])){
        $folder = 'products/'. date('Y') . '/'. date('m');

        $data['img'] = $request->file('img')->store('images/'. $folder);

      }
      $item = ProductCategory::find($id);

      $item ->update($data);
      return redirect()->route('admin.product_categories.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $category = ProductCategory::find($id);
//      if ($category->products->count()) {
//        return redirect()->route('admin.product_categories.index')->with('error', 'Ошибка! У категории есть записи');
//      }
      $category->delete();
      return redirect()->route('admin.product_categories.index')->with('success', 'Категория удалена');
    }
}
