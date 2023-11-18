@extends('templates.master')
@section('content')
    <main>

        <div class="slider-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider-active dot-style">

                            <div class="single-slider slider-height slider-bg1 d-flex align-items-center">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-7">
                                            <div class="hero-caption text-center">
                                                <span data-animation="fadeInUp" data-delay=".2s">Science Fiction</span>
                                                <h1 data-animation="fadeInUp" data-delay=".4s">The History<br> of
                                                    Phipino</h1>
                                                <a href="#" class="btn hero-btn" data-animation="bounceIn"
                                                    data-delay=".8s">Browse Store</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-slider slider-height slider-bg2 d-flex align-items-center">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-7">
                                            <div class="hero-caption text-center">
                                                <span data-animation="fadeInUp" data-delay=".2s">Science
                                                    Fiction</span>
                                                <h1 data-animation="fadeInUp" data-delay=".4s">The History<br> of
                                                    Phipino</h1>
                                                <a href="#" class="btn hero-btn" data-animation="bounceIn"
                                                    data-delay=".8s">Browse Store</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-slider slider-height slider-bg3 d-flex align-items-center">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-7">
                                            <div class="hero-caption text-center">
                                                <span data-animation="fadeInUp" data-delay=".2s">Science
                                                    Fiction</span>
                                                <h1 data-animation="fadeInUp" data-delay=".4s">The History<br> of
                                                    Phipino</h1>
                                                <a href="#" class="btn hero-btn" data-animation="bounceIn"
                                                    data-delay=".8s">Browse Store</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="best-selling section-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <h2>Sách bán chạy nhất</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="selling-active">

                            @foreach ($result as $r)
                            <div class="properties pb-20">
                               
                                    <div class="properties-card">
                                        <div class="properties-img">
                                            <a href=""><img src="{{ $r->image ? '' . Storage::url($r->image) : '' }}"
                                                    alt></a>
                                        </div>
                                        <div class="properties-caption">
                                            <h3><a href="">{{ $r->pro_name }}</a></h3>
                                            @foreach ($author as $a)
                                                @if ($a->id == $r->pro_author_id)
                                                    <p>By {{ $a->a_name }}</p>
                                                @endif
                                            @endforeach
                                            <div
                                                class="properties-footer d-flex justify-content-between align-items-center">
                                                <div class="price">
                                                    <span>{{ number_format($r->pro_price_sale) }} ₫</span>
                                                    <del>{{ number_format($r->pro_price) }}₫</del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              

                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="services-area2 top-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-9 col-md-8">
                        <div class="row">

                            <div class="col-xl-12">
                                <div class="section-tittle d-flex justify-content-between align-items-center mb-40">
                                    <h2 class="mb-0">Nổi bật trong tuần</h2>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="services-active">
                                    @foreach ($product_1 as $p_1)
                                        <div class="single-services d-flex align-items-center">
                                            <div class="features-img">
                                                <img src="{{ $p_1->image ? '' . Storage::url($p_1->image) : '' }}"
                                                    style="width: 300px" alt>
                                            </div>
                                            <div class="features-caption">
                                                <img src="assets/img/icon/logo.html" alt>
                                                <h3>{{ $p_1->pro_name }}</h3>
                                                @foreach ($author as $a)
                                                    @if ($a->id == $p_1->pro_author_id)
                                                        <p>By {{ $a->a_name }}</p>
                                                    @endif
                                                @endforeach

                                                <div class="price">
                                                    <span>{{ number_format($p_1->pro_price_sale) }} ₫</span>
                                                    <del>{{ number_format($p_1->pro_price) }}₫</del>
                                                </div>

                                                <a href="{{ route('show_product', ['id' => $p_1->id]) }}"
                                                    class="border-btn">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-9">

                        <div class="google-add">
                            <img src="{{ asset('img/gallery/ad.jpg') }}" alt class="w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="our-client section-padding best-selling">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-5 col-lg-5 col-md-12">

                        <div class="section-tittle  mb-40">
                            <h2>Sách mới</h2>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container">

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">

                        <div class="row">
                            @foreach ($product_2 as $p_2)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <div class="properties pb-30">
                                        <div class="properties-card">
                                            <div class="properties-img">
                                                <a href="{{ route('show_product', ['id' => $p_2->id]) }}"><img
                                                        src="{{ $p_2->image ? '' . Storage::url($p_2->image) : '' }}"
                                                        alt></a>
                                            </div>
                                            <div class="properties-caption properties-caption2">
                                                <h3><a
                                                        href="{{ route('show_product', ['id' => $p_2->id]) }}">{{ $p_2->pro_name }}</a>
                                                </h3>
                                                @foreach ($author as $a)
                                                    @if ($a->id == $p_2->pro_author_id)
                                                        <p>{{ $a->a_name }}</p>
                                                    @endif
                                                @endforeach
                                                <div
                                                    class="properties-footer d-flex justify-content-between align-items-center">

                                                    <div class="price">
                                                        <span>{{ number_format($p_2->pro_price_sale) }} ₫</span>
                                                        <br>
                                                        <del>{{ number_format($p_2->pro_price) }} ₫</del>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
