<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use function PHPUnit\Framework\isEmpty;

date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
class HomeController extends Controller
{
    //
    public function index()
    {
        if (Auth::id()) {
            $role = Auth()->user()->role;
            if ($role == 0) {
                $product_1 = DB::table('products')
                    ->select('*')
                    ->orderBy('created_at', 'desc')
                    ->limit(3)
                    ->get();
                $product_2 = DB::table('products')
                    ->select('*')
                    ->orderBy('created_at', 'desc')
                    ->limit(6)
                    ->get();
                $category = DB::table('categories')
                    ->select('id', 'c_name')
                    ->get();
                $author = DB::table('authors')
                    ->select('id', 'a_name')
                    ->get();
                    $result = DB::table('order_details')
                    ->join('products', 'order_details.od_product_id', '=', 'products.id')
                    ->select('products.image','products.pro_name','products.pro_price','products.pro_price_sale','products.pro_author_id', DB::raw('SUM(od_quantity) as total_quantity'))
                    ->groupBy('products.image','products.pro_name','products.pro_price','products.pro_price_sale','products.pro_author_id')
                    ->orderByDesc('total_quantity')
                    ->limit(3)
                    ->get();
                return view('index', compact('product_2', 'category', 'author', 'product_1','result'));
            } else if ($role == 1) {
                return view('admin.dashboard');
            } else {
                return redirect()->back();
            }
        }
    }
    public function showIndex()
    {

        $product_1 = DB::table('products')
            ->select('*')
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();
        $product_2 = DB::table('products')
            ->select('*')
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();
        $category = DB::table('categories')
            ->select('id', 'c_name')
            ->get();
        $author = DB::table('authors')
            ->select('id', 'a_name')
            ->get();
        $result = DB::table('order_details')
            ->join('products', 'order_details.od_product_id', '=', 'products.id')
            ->select('products.image','products.pro_name','products.pro_price','products.pro_price_sale','products.pro_author_id', DB::raw('SUM(od_quantity) as total_quantity'))
            ->groupBy('products.image','products.pro_name','products.pro_price','products.pro_price_sale','products.pro_author_id')
            ->orderByDesc('total_quantity')
            ->limit(3)
            ->get();
        return view('index', compact('product_2', 'category', 'author', 'product_1','result'));
    }
    public function showCategory($id)
    {
        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'giam_dan') {
                $product = DB::table('products')->select('*')->orderBy('pro_price_sale', 'DESC')->get();
            } elseif ($sort_by == 'tang_dan') {
                $product = DB::table('products')->select('*')->orderBy('pro_price_sale', 'ASC')->get();
            } elseif ($sort_by == 'kytu_az') {
                $product = DB::table('products')->select('*')->orderBy('pro_name', 'ASC')->get();
            } elseif ($sort_by == 'kytu_za') {
                $product = DB::table('products')->select('*')->orderBy('pro_name', 'DESC')->get();
            }
        } else {
            $product = Product::all();
        }
        $category_show = Category::find($id);
        $category = DB::table('categories')
            ->select('id', 'c_name')
            ->get();
        $author = DB::table('authors')
            ->select('id', 'a_name')
            ->get();


        return view('category', compact('category_show', 'product', 'category', 'author'));
    }
    public function search(Request $request)
    {
        $category = DB::table('categories')
            ->select('id', 'c_name')
            ->get();
        $search = '%' . $request->search . '%';
        $author = DB::table('authors')
            ->select('id', 'a_name')
            ->get();


        $product = DB::select("SELECT p.*, au.a_name as author FROM products p JOIN categories ct ON ct.id = p.pro_category_id
        JOIN authors au ON au.id = p.pro_author_id WHERE p.pro_name LIKE ? OR au.a_name LIKE ? OR ct.c_name LIKE ?", [$search, $search, $search]);

        return view('search', compact('category', 'product', 'author'));
    }
    public function showProduct($id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404);
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
        $comment = DB::table('comments')
            ->join('products', 'products.id', '=', 'comments.com_product_id')
            ->join('users', 'users.id', '=', 'comments.com_user_id')
            ->select('products.id', 'users.name', 'users.image', 'comments.com_content', 'comments.created_at')
            ->where('products.id', $id)
            ->get();
        $results = Comment::select('com_product_id', DB::raw('COUNT(*) as comment_count'))
            ->groupBy('com_product_id')
            ->where('comments.com_product_id', $id)
            ->get();
        $author = Author::all();
        $ratingAvg = Rating::where('product_id', $id)->avg('rating');
        return view('book_detail', compact('product', 'category', 'publisher', 'supplier', 'author', 'comment', 'results', 'ratingAvg'));
    }
    public function comment($id, Request $request)
    {
        $idPro = $id;
        $comment = new Comment;
        $comment->com_product_id = $idPro;
        $comment->com_user_id = Auth::user()->id;
        $comment->com_content = $request->com_content;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $comment->created_at = now();
        $comment->save();
        return redirect()->back();
    }
    public function rating($id, Request $request)
    {
        $idRa = $id;
        $rating = new Rating;
        $rating->product_id = $idRa;
        $rating->user_id = Auth::user()->id;
        $rating->rating = $request->rating_star;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $rating->created_at = now();
        $rating->save();
        return redirect()->back();
    }
    public function add_cart_ajax(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');

        if ($cart == true) {
            $is_available = 0;
            foreach ($cart as $key => $val) {
                if ($val['id'] == $data['cart_product_id']) {
                    $is_available++;
                    $cart[$key] = array(
                        'session_id' => $val['session_id'],
                        'pro_name' => $val['pro_name'],
                        'id' => $val['id'],
                        'image' => $val['image'],
                        'quantity' => $val['quantity'],
                        'quantity' => $val['quantity'] + $data['cart_product_qty'],
                        'pro_price_sale' => $val['pro_price_sale'],
                    );
                    Session::put('cart', $cart);
                }
            }
            if ($is_available == 0) {
                $cart[] = array(
                    'session_id' => $session_id,
                    'pro_name' => $data['cart_product_name'],
                    'id' => $data['cart_product_id'],
                    'image' => $data['cart_product_image'],
                    'quantity' => $data['cart_product_qty'],
                    'pro_price_sale' => $data['cart_product_price']
                );
                Session::put('cart', $cart);
            }
        } else {
            $cart[] = array(
                'session_id' => $session_id,
                'pro_name' => $data['cart_product_name'],
                'id' => $data['cart_product_id'],
                'image' => $data['cart_product_image'],
                'quantity' => $data['cart_product_qty'],
                'pro_price_sale' => $data['cart_product_price']
            );
        }

        Session::put('cart', $cart);
        Session::save();
    }
    public function showCart()
    {
        if (Session::has('cart')) {
            $category = DB::table('categories')
                ->select('id', 'c_name')
                ->get();

            return view('cart', compact('category'));
        } else {
            return redirect()->route('show_index')->with(['message' => 'Giỏ hàng bạn đang trống!']);
        }
    }
    public function deleteCart($session_id)
    {
        $cart = Session::get('cart');
        if ($cart == true) {
            foreach ($cart as $key => $val) {
                if ($val['session_id'] == $session_id) {
                    unset($cart[$key]);
                    if (isEmpty($cart)) {
                        Session::forget('cart');
                        Session::forget('coupon');
                    }
                }
            }
            Session::put('cart', $cart);

            return redirect()->back()->with('message', 'Xóa sản phẩm thành công');
        } else {
            return redirect()->back()->with('error', 'Xóa sản phẩm thất bại');
        }
    }
    public function delCoupon()
    {
        $coupon = Session::get('coupon');
        if ($coupon == true) {
            Session::forget('coupon');
            return redirect()->back()->with('message', 'Xóa mã thành công');
        }
    }
    public function updateCart(Request $request)
    {
        $data = $request->all();

        $cart = Session::get('cart');
        if ($cart == true) {
            foreach ($data['cart_qty'] as $key => $qty) {
                foreach ($cart as $session => $val) {
                    if ($val['session_id'] == $key) {
                        $cart[$session]['quantity'] = $qty;
                    }
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message', 'Sửa sản phẩm thành công');
        } else {
            return redirect()->back();
        }
    }
    public function checkCoupon(Request $request)
    {
        $data = $request->all();
        $coupon = Coupon::where('coupon_code', $data['coupon'])->first();
        if ($coupon) {
            $count_coupon = $coupon->count();
            if ($count_coupon > 0) {
                $coupon_session = Session::get('coupon');
                if ($coupon_session == true) {
                    $is_available = 0;
                    if ($is_available == 0) {
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,
                        );
                        Session::put('coupon', $cou);
                    }
                } else {
                    $cou[] = array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_condition' => $coupon->coupon_condition,
                        'coupon_number' => $coupon->coupon_number,
                    );
                    Session::put('coupon', $cou);
                }
                Session::save();
                return redirect()->back()->with('message', 'Thêm mã giảm giá thành công');
            }
        } else {
            return redirect()->back()->with('error', 'Mã giảm giá không đúng');
        }
    }
    public function checkOut(Request $request)
    {
        if (Session::get('cart')) {
            $category = DB::table('categories')
                ->select('id', 'c_name')
                ->get();
            $cart = Session::get('cart');

            return view('checkout', compact('category'));
        } else {
            return redirect()->route('show_index')->with(['message' => 'Giỏ hàng bạn đang trống!']);
        }
    }
    public function saveCheckout(Request $request)
    {
        $category = DB::table('categories')
            ->select('id', 'c_name')
            ->get();
        $p_data = array();
        $p_data['p_status'] = 'Đang chờ xử lý';
        $p_data['p_type'] = $request->payment_option;
        $p_id = DB::table('payments')->insertGetId($p_data);

        $data = array();
        $checkout_code = substr(md5(microtime()), rand(0, 26), 5);
        $data['o_fullname'] = $request->o_fullname;
        $data['o_phone'] = $request->o_phone;
        $data['o_email'] = $request->o_email;
        $data['o_address'] = $request->o_address;
        $data['o_note'] = $request->o_note;
        $data['o_coupon'] = $request->order_coupon;
        $data['o_user_id'] = $request->o_user_id;
        $data['o_payment_id'] = $p_id;
        $data['o_total'] = $request->total_all;
        $data['checkout_code'] = $checkout_code;
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $data['created_at'] = now();
        $data['o_status'] = 'Đang chờ xử lý';
        $o_id = DB::table('orders')->insertGetId($data);

        // $content  = Session::get('cart');
        foreach (Session::get('cart') as $content => $v_content) {
            $od_data['od_product_id'] = $v_content['id'];
            $od_data['od_order_id'] = $o_id;
            $od_data['od_product_name'] = $v_content['pro_name'];
            $od_data['od_price'] = $v_content['pro_price_sale'];
            $od_data['od_quantity'] = $v_content['quantity'];
            DB::table('order_details')->insert($od_data);
        }
        //sendmail
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_mail = "Thông báo đặt hàng thành công từ ABCBook" . ' ' . $now;
        $user = User::find(Session::get('id'));
        if (Session::get('cart') == true) {
            foreach (Session::get('cart') as $key => $cart_mail) {
                $cart_array[] = array(
                    'pro_name' => $cart_mail['pro_name'],
                    'pro_price_sale' => $cart_mail['pro_price_sale'],
                    'quantity' => $cart_mail['quantity'],
                );
            }
        }
        $order_array = array(
            'o_name' => $request->o_fullname,
            'o_phone' => $request->o_phone,
            'o_email' => $request->o_email,
            'o_address' => $request->o_address,
            'o_note' => $request->o_note,
            'o_payment' => $request->payment_option,
            'o_total' => $request->total_all
        );
        if ($request->order_coupon != 'no') {
            $coupon = Coupon::where('coupon_code', $request->order_coupon)->first();
            $coupon_mail = $coupon->coupon_code;
        } else {
            $coupon_mail = 'Không có';
        }

        $ordercode_mail = array(
            'coupon_code' => $coupon_mail,
            'order_code' => $checkout_code
        );
        if ($p_data['p_type'] == 1) {
            Mail::send('mail.mail_order', ['cart' => $cart_array, 'shipping' => $order_array, 'code' => $ordercode_mail], function ($email) use ($title_mail, $request) {
                $email->subject($title_mail);
                $email->to($request->o_email);
            });
            Session::forget('coupon');
            Session::forget('cart');
            return view('handcash', compact('category'));
        } else {
            Mail::send('mail.mail_order', ['cart' => $cart_array, 'shipping' => $order_array, 'code' => $ordercode_mail], function ($email) use ($title_mail, $request) {
                $email->subject($title_mail);
                $email->to($request->o_email);
            });
            Session::forget('coupon');
            Session::forget('cart');
            return view('handcash', compact('category'));
        }
    }
}