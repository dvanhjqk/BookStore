<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function index(){
        $order = Order::all();
        return view('admin/order.order',compact('order'));
    }
    public function detail($id){
        $detail_product = DB::table('orders')
        ->join('order_details','orders.id','=','order_details.od_order_id')
        ->select('orders.*','order_details.*') 
        ->where('orders.id', $id)
        ->get();
        $detail = DB::table('orders')
        ->join('order_details','orders.id','=','order_details.od_order_id')
        ->join('users','orders.o_user_id','=','users.id')
        ->join('payments','orders.o_payment_id','=','payments.id')
        ->select('orders.*','order_details.*','users.*','payments.*') 
        ->where('orders.id', $id)
        ->first();
        return view('admin/order.detail',compact('detail','detail_product'));
    }
    public function delete($id)
    {
       Order::where('id', $id)->delete();
    
        return redirect()->route('order_index');
    }
}
