<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Category;

use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Session;
class CategoryController extends Controller
{
    //
    public function index(){
        $category =  Category::all();
    return view('admin/category.index', compact('category'));
    }
    public function add(CategoryRequest $request)
    {
        if ($request->isMethod('POST')) { //tồn tại phương thức post
            $params = $request->except('_token');
            $category = Category::create($params);
            if ($category->id) {
                Session::flash('success', 'thêm mới thành công danh mục');
                return redirect()->route('category_add');
            }
        }
        return view('admin/category.add');
    }
    public function edit(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            $result = Category::where('id', $id)
                ->update($params);
            if ($result) {
                Session::flash('success', 'sửa thành công danh mục');
                return redirect()->route('category_edit', ['id' => $id]);
            }
        }
        return view('admin/category.edit', compact('category'));
    }
    public function delete($id)
    {
        Category::where('id', $id)->delete();
        Session::flash('success', 'xóa thành công danh mục');
        return redirect()->route('category_index');
    }
}
