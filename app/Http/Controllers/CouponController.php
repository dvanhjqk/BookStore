<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class CouponController extends Controller
{
    //
    public function index()
    {
        $coupon =  Coupon::all();
        return view('admin/coupon.index', compact('coupon'));
    }
    public function add(Request $request)
    {
        if ($request->isMethod('POST')) { //tồn tại phương thức post
            $params = $request->except('_token');
            $coupon = Coupon::create($params);
            if ($coupon->id) {
                Session::flash('success', 'thêm mới thành công mã giảm giá');
                return redirect()->route('coupon_add');
            }
        }
        return view('admin/coupon.add');
    }
    public function delete($id)
    {
        Coupon::where('id', $id)->delete();
        Session::flash('success', 'xóa thành công mã giảm giá');
        return redirect()->route('coupon_index');
    }
}
