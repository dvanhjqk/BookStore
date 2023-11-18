@extends('templates.master')
@section('content')
    <section class="checkout_area section-padding">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-7">
                        <h3>Thông tin giao hàng</h3>
                        <form class="row contact_form" action="{{ route('save_checkout') }}" method="post"
                            novalidate="novalidate">
                            @csrf
                            <input type="hidden" value="{{ Auth::user()->id }}" name="o_user_id">
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}"
                                    name="o_fullname" />

                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" value="{{ Auth::user()->phone }}"
                                    name="o_phone" />


                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" value="{{ Auth::user()->email }}"
                                    name="o_email" />


                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" required
                                    value="{{ Auth::user()->address }}"
                                    name="o_address" placeholder="Địa chỉ" />

                            </div>

                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <h3>Chi tiết giao hàng</h3>

                                </div>
                                <textarea class="form-control" name="o_note" rows="1" placeholder="Order Notes"></textarea>
                            </div>

                    </div>
                    <div class="col-lg-5">
                        <div class="order_box">
                            <h2>Hóa đơn</h2>
                            <ul class="list">
                                @php
                                    $total = 0;
                                @endphp
                                <li>
                                    <a href="#">Sản phẩm<span>Tiền</span>
                                    </a>
                                </li>
                                @foreach (Session::get('cart') as $key => $cart)
                                    @php
                                        $subtotal = $cart['pro_price_sale'] * $cart['quantity'];
                                        $total += $subtotal;
                                    @endphp
                                    <li>
                                        <a href="#">{{ $cart['pro_name'] }}
                                            <span class="middle">x {{ $cart['quantity'] }}</span>
                                            <span class="last"> {{ number_format($subtotal) }} đ</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <ul class="list list_2">
                                @if (Session::get('coupon'))
                                    @foreach (Session::get('coupon') as $key => $cou)
                                        @if ($cou['coupon_condition'] == 1)
                                            <li>
                                                <a href="#">Mã giảm giá
                                                    <span>{{ $cou['coupon_number'] }}%</span>
                                                    <input type="hidden" name="order_coupon"
                                                        value="{{ $cou['coupon_code'] }}">
                                                </a>
                                            </li>

                                            @php
                                                $total_coupon = ($total * $cou['coupon_number']) / 100;
                                                $total_all = $total - $total_coupon;
                                            @endphp
                                            <li>
                                                <a href="#">Tổng tiền<span>{{ number_format($total_all) }} ₫</span>
                                                    <input type="hidden" value="{{ $total_all }}" name="total_all">
                                                </a>

                                            </li>
                                        @else
                                            <li>
                                                <a href="#">Mã giảm giá
                                                    <span>{{ number_format($cou['coupon_number']) }}đ</span>
                                                    <input type="hidden" name="order_coupon"
                                                        value="{{ $cou['coupon_code'] }}">
                                                </a>
                                            </li>
                                            <li>
                                                @php
                                                    $total_all = $total - $cou['coupon_number'];
                                                    if ($total_all < 0) {
                                                        $total_all = 0;
                                                    }
                                                @endphp
                                            </li>
                                            <li>
                                                <a href="#">Tổng tiền<span>{{ number_format($total_all) }} ₫</span>
                                                    <input type="hidden" value="{{$total_all}}" name="total_all">
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                @else
                                <li>
                                    <a href="#">Tổng tiền<span>{{ number_format($total) }} ₫</span>
                                        <input type="hidden" value="{{$total}}" name="total_all">
                                </li>
                                    <input type="hidden" name="order_coupon" value="no">
                                @endif
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" value="1" name="payment_option" />
                                    <label for="f-option5">Thanh toán bằng ngân hàng</label>
                                    <div class="check"></div>
                                </div>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" value="2" name="payment_option" />
                                    <label for="f-option6">Thanh toán khi nhận hàng </label>
                                    <div class="check"></div>
                                </div>

                            </div>
                            <button class="btn w-100" type="submit"  onclick="return confirm('Xác nhận thanh toán?')">Thanh toán</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
