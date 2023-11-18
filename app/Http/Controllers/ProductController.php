<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index()
    {
        $product = Product::orderBy('created_at','desc')->paginate(5);
        $category = DB::table('categories')
            ->select('id', 'c_name')
            ->get();
        $publisher = DB::table('publisher')
            ->select('id', 'p_name')
            ->get();
        $supplier = DB::table('supplier')
            ->select('id', 'sup_name')
            ->get();
        $author = DB::table('authors')
            ->select('id', 'a_name')
            ->get();
        return view('admin/product.index', compact('product', 'category', 'publisher', 'supplier', 'author'))->with('i',(request()->input('page',1)-1)*5);
    }
    public function add(ProductRequest $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['image'] = uploadFile('hinh', $request->file('image'));
            }
            $product = Product::create($params);
            if ($product->id) {
                Session::flash('success', 'thêm mới thành công sản phẩm');
                return redirect()->route('product_add');
            }
        }
        $category = DB::table('categories')
            ->select('id', 'c_name')
            ->get();
        $publisher = DB::table('publisher')
            ->select('id', 'p_name')
            ->get();
        $supplier = DB::table('supplier')
            ->select('id', 'sup_name')
            ->get();
        $author = DB::table('authors')
            ->select('id', 'a_name')
            ->get();
        return view('admin/product.add', compact('category', 'publisher', 'supplier', 'author'));
    }
    public function edit(productRequest $request, $id)
    {
        $product = Product::find($id);
        $category = DB::table('categories')
            ->select('id', 'c_name')
            ->get();
        $publisher = DB::table('publisher')
            ->select('id', 'p_name')
            ->get();
        $supplier = DB::table('supplier')
            ->select('id', 'sup_name')
            ->get();
        $author = DB::table('authors')
            ->select('id', 'a_name')
            ->get();
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $resultDL = Storage::delete('/public/'.$product->image);
                if ($resultDL) {
                    $params['image'] = uploadFile('hinh', $request->file('image'));
                }
            } else {
                $params['image'] = $product->image;
            }
            $result = Product::where('id', $id)
                ->update($params);
            if ($result) {
                Session::flash('success', 'sửa thành công sản phẩm');
                return redirect()->route('product_edit', ['id' => $id]);
            }
        }
        return view('admin/product.edit', compact('product','category', 'publisher', 'supplier', 'author'));
    }
    public function delete($id)
    {
        Product::where('id', $id)->delete();
        Session::flash('success', 'xóa thành công sản phẩm');
        return redirect()->route('product_index');
    }
}
