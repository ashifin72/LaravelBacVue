<?php

  namespace App\Http\Controllers\Admin;

  use App\Http\Controllers\Controller;
  use App\Models\Product;
  use App\Models\ProductCategory;
  use Illuminate\Http\Request;

  class ProductController extends Controller
  {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $items = Product::paginate(20);
      return view('admin.shop.products.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $item = Product::make();

      $categoryList = ProductCategory::pluck('title', 'id')->all();

      return view('admin.shop.products.create',
        compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->input();
      if (($request['img'])) {
        $folder = 'posts/' . date('Y') . '/' . date('m');

        $data['img'] = $request->file('img')->store('images/' . $folder);
      }
      $item = Product::create($data);
      if ($item) {
        return redirect()->route('admin.products.index')->with('success', 'Товар добавлен');
      }
      return back()->withErrors(['msg' => __('admin.error_save')]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $item = Product::find($id);
      $categoryList = ProductCategory::pluck('title', 'id')->all();
      return view('admin.shop.products.edit',
        compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
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
      $item = Product::find($id);
      $item ->update($data);
      return redirect()->route('admin.products.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //
    }
  }
