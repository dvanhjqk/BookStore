<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SupplierRequest;
use Illuminate\Support\Facades\Session;
class SupplierController extends Controller
{
    public function index(){
        $supplier = Supplier::all();
    return view('admin/supplier.index', compact('supplier'));
    }
    public function add(SupplierRequest $request)
    {
        if ($request->isMethod('POST')) { //tồn tại phương thức post
            $params = $request->except('_token');
            $supplier = Supplier::create($params);
            if ($supplier->id) {
                Session::flash('success', 'thêm mới thành công nhà cung cấp');
                return redirect()->route('supplier_add');
            }
        }
        return view('admin/supplier.add');
    }
    public function edit(SupplierRequest $request, $id)
    {
        $supplier = Supplier::find($id);
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            $result = Supplier::where('id', $id)
                ->update($params);
            if ($result) {
                Session::flash('success', 'sửa thành công nhà cung cấp');
                return redirect()->route('supplier_edit', ['id' => $id]);
            }
        }
        return view('admin/supplier.edit', compact('supplier'));
    }
    public function delete($id)
    {
        supplier::where('id', $id)->delete();
        Session::flash('success', 'xóa thành công nhà cung cấp');
        return redirect()->route('supplier_index');
    }
}
