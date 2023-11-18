<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @extends('templates.master')
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="slider-area">
                        <div class="slider-height2 slider-bg5 d-flex align-items-center justify-content-center">
                            <div class="hero-caption hero-caption2">
                                <h2>Cart</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="cart_area section-padding">
            <div class="container">
                <div class="cart_inner">
                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp

                                <form action="{{ url('/update-qty') }}" method="POST" id="update-qty">
                                    @csrf
                                    @foreach (Session::get('cart') as $key => $cart)
                                        @php
                                            $subtotal = $cart['pro_price_sale'] * $cart['quantity'];
                                            $total += $subtotal;
                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <img src="{{ $cart['image'] ? '' . Storage::url($cart['image']) : '' }}"
                                                            alt />
                                                    </div>
                                                    <div class="media-body">
                                                        <p>{{ $cart['pro_name'] }}</p>
                                                        <input type="hidden" value="{{ $cart['pro_name'] }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5>{{ number_format($cart['pro_price_sale']) }} ₫</h5>
                                            </td>
                                            <td>
                                                <div class="product_count">


                                                    <input class="input-number2 cart_quantity" type="number"
                                                        value="{{ $cart['quantity'] }}"
                                                        name="cart_qty[{{ $cart['session_id'] }}]" min="1">



                                                </div>
                                            </td>


                                            <td>
                                                <h5>{{ number_format($subtotal) }} ₫</h5>
                                            </td>
                                            <td style="width: 50px">
                                                <a href="{{ url('/delete-cart/' . $cart['session_id']) }}"><i
                                                        class="fa-solid fa-xmark"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </form>
                                <tr class="bottom_button">
                                    <td>
                                        <button class="shadow btn custom-btn" name="update_qty"
                                            onclick="
                                              
                                                    document.getElementById('update-qty').submit();
                                                
                                                ">Update</button>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>
                                    <td>
                                        <h5>{{ number_format($total) }} ₫</h5>
                                    </td>
                                </tr>
                                <tr>
                                </tr>
                                <tr class="shipping_area">
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h5>Mã giảm giá</h5>
                                    </td>
                                    <td>
                                        <div class="shipping_box">
                                            <ul class="list">

                                                @if (Session::get('coupon'))
                                                    @foreach (Session::get('coupon') as $key => $cou)
                                                        @if ($cou['coupon_condition'] == 1)
                                                            <li>
                                                                {{ $cou['coupon_number'] }} %
                                                            </li>
                                                            <li>
                                                                @php
                                                                    $total_coupon = ($total * $cou['coupon_number']) / 100;
                                                                    echo 'Tổng giảm: ' . number_format($total_coupon);
                                                                @endphp
                                                            </li>
                                                            <li>
                                                                Tổng tiền đã giảm:
                                                                {{ number_format($total - $total_coupon) }} ₫
                                                            </li>
                                                        @else
                                                            <li>
                                                                {{ number_format($cou['coupon_number']) }} đ
                                                            </li>
                                                            <li>
                                                                @php
                                                                    $total_coupon = $total - $cou['coupon_number'];
                                                                    if ($total_coupon < 0){
                                                                        $total_coupon = 0;
                                                                    }
                                                                @endphp
                                                            </li>
                                                            <li>
                                                               
                                                                    Tổng tiền đã giảm: {{ number_format($total_coupon) }} ₫
                                                              
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                @endif

                                              
                                        </div>
                                        
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>

                                    <td>
                                @if (Session::get('cart'))
                                <form action="{{ route('check_coupon') }}" method="POST">
                                    @csrf
                                    <input class="post_code" type="text" name="coupon"
                                        placeholder="Nhập mã giảm giá" />
                                    <input type="submit" name="check_coupon" class="check_coupon">
                                </form>
                            @endif
                        </td>
                        </tr>
                            </tbody>
                            
                        </table>
                        
                        <div class="checkout_btn_inner float-right">
                            <a class="btn" href="{{ route('show_index') }}">Tiếp tục mua hàng</a>
                            @if (Session::get('coupon'))
                            <a class="btn" href="{{ route('unset_coupon') }}">Xóa mã giảm giá</a>
                            @endif
                            <a class="btn" href="{{ route('check_out', Auth()->user()->id) }}">Thanh toán</a>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endsection
