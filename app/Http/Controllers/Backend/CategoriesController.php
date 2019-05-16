<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;

class CategoriesController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::with('posts')->orderBy('title')->paginate($this->limit);
        $categoriesCount = Category::count();
        return view("backend.categories.index", compact('categories', 'categoriesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        return view("backend.categories.create", compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CategoryStoreRequest $request)
    {
        Category::create($request->all());
        return redirect("/backend/categories")->with("message", "หมวดหมู่ใหม่ได้บันทึกเรียบร้อยแล้ว!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $category = Category::findOrfail($id);
      return view("backend.categories.edit", compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CategoryUpdateRequest $request, $id)
    {
      Category::findOrfail($id)->update($request->all());
      return redirect("/backend/categories")->with("message", "หมวดหมู่ได้แก้ไขเรียบร้อยแล้ว!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\CategoryDestroyRequest $request, $id)
    {
      $category = Category::findOrfail($id);
      Post::withTrashed()->where('category_id', $id)->update(['category_id' => config('cms.default_category_id')]);
      $category->delete();
      return redirect("/backend/categories")->with("message", "หมวดหมู่ได้ลบออกจากระบบเรียบร้อยแล้ว!");
    }
}
