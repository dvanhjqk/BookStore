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
        <div class="services-area2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12">

                                <div class="single-services d-flex align-items-center mb-0">
                                    <div class="features-img">
                                        <img src="{{ $product->image ? '' . Storage::url($product->image) : '' }}" alt
                                            style="width: 500px">
                                    </div>
                                    <div class="features-caption">
                                        <h3>{{ $product->pro_name }}</h3>
                                        @foreach ($author as $a)
                                            @if ($a->id == $product->pro_author_id)
                                                <p>Tác giả: {{ $a->a_name }}</p>
                                            @endif
                                        @endforeach
                                        @foreach ($publisher as $pub)
                                            @if ($pub->id == $product->pro_publisher_id)
                                                <p>Nhà xuất bản: {{ $pub->p_name }}</p>
                                            @endif
                                        @endforeach
                                        @foreach ($supplier as $sup)
                                            @if ($sup->id == $product->pro_supplier_id)
                                                <p>Nhà cung cấp: {{ $sup->sup_name }}</p>
                                            @endif
                                        @endforeach
                                        <div class="price">
                                            <span>{{ number_format($product->pro_price_sale) }} ₫</span>
                                            <del>{{ number_format($product->pro_price) }}₫</del>
                                        </div>
                                        <div class="review">
                                            <div class="rating" id="rateYo1">
                                                
                                            </div>
                                            @foreach ($results as $r)
                                            <p>{{ $r->comment_count }} Bình luận</p>
                                        @endforeach
                        
                                        </div>
                                        <form>
                                            @csrf
                                            <div class="buttons d-flex my-5">


                                                <button class="shadow btn custom-btn add-to-cart" name="add-to-cart"
                                                    data-id="{{ $product->id }}" type="button">Add to cart</button>

                                            </div>
                                            <input type="hidden" value="{{ $product->id }}"
                                                class="cart_product_id_{{ $product->id }}">
                                            <input type="hidden" value="{{ $product->pro_name }}"
                                                class="cart_product_name_{{ $product->id }}">
                                            <input type="hidden" value="{{ $product->image }}"
                                                class="cart_product_image_{{ $product->id }}">
                                            <input type="hidden" value="{{ $product->pro_price_sale }}"
                                                class="cart_product_price_{{ $product->id }}">
                                            <input type="hidden" value="1"
                                                class="cart_product_qty_{{ $product->id }}">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="our-client section-padding best-selling">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-1 col-xl-10">
                        <div class="nav-button f-left">

                            <nav>
                                <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                    <a class="nav-link active" id="nav-one-tab" data-bs-toggle="tab" href="#nav-one"
                                        role="tab" aria-controls="nav-one" aria-selected="true">Mô tả</a>
                                    <a class="nav-link" id="nav-two-tab" data-bs-toggle="tab" href="#nav-two" role="tab"
                                        aria-controls="nav-two" aria-selected="false">Tác giả</a>
                                    <a class="nav-link" id="nav-three-tab" data-bs-toggle="tab" href="#nav-three"
                                        role="tab" aria-controls="nav-three" aria-selected="false">Bình luận</a>

                                </div>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container">

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">

                        <div class="row">
                            <div class="offset-xl-1 col-lg-9">
                                <p>{{ $product->pro_description }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">

                        <div class="row">
                            <div class="offset-xl-1 col-lg-9">
                                <div class="row">
                                    @foreach ($author as $a)
                                        @if ($a->id == $product->pro_author_id)
                                            <div class="col-md-9">
                                                <p class="text-right">{{ $a->a_info }}</p>
                                            </div>
                                            <div class="col-md-3">
                                                <img src="{{ $a->image ? '' . Storage::url($a->image) : '' }}" alt
                                                    class="img-fluid">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-three" role="tabpanel" aria-labelledby="nav-three-tab">

                        <div class="row">
                            <div class="offset-xl-1 col-lg-9">
                              

                                @foreach ($results as $r)
                                    <h4>{{ $r->comment_count }} Bình luận</h4>
                                @endforeach
                                <div class="comments-area">

                                    @foreach ($comment as $c)
                                        <div class="comment-list">

                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <img src="{{ $c->image ? '' . Storage::url($c->image) : '' }}"
                                                            alt>
                                                    </div>
                                                    <div class="desc">
                                                        <p class="comment">
                                                            {{ $c->com_content }}
                                                        </p>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <h5>
                                                                    <a href="#">{{ $c->name }}</a>
                                                                </h5>
                                                                <p class="date">{{ $c->created_at }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                                @if (Route::has('login'))
                                    @auth
                                        <div class="comment-form">
                                        
                                            
                                            <h4>Để lại bình luận</h4>
                                            <form class="form-contact comment_form"
                                                action="{{ route('comment', ['id' => $product->id]) }}" method="POST"
                                                id="commentForm">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control w-100" name="com_content" id="comment" cols="30" rows="9"
                                                                placeholder="Write Comment"></textarea>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="form-group">
                                                    <button type="submit"
                                                        class="button button-contactForm btn_1 boxed-btn">Bình luận</button>
                                                </div>
                                            </form>
                                        </div>
                                    @else
                                        <div class="check_title">
                                            <h2>
                                                Bạn phải đăng nhập để bình luận.
                                                <a href="{{ route('login') }}">Bấm vào đây để đăng nhập</a>
                                            </h2>
                                        </div>
                                    @endauth
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endsection
