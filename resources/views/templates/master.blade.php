<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from preview.colorlib.com/theme/abcbook/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Sep 2023 15:00:26 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Book Shop</title>
    <meta name="description" content>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/price_rangs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  
</head>

<body>
    <header>
        <div class="header-area">
            <div class="main-header ">
                <div class="header-top ">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="d-flex justify-content-between align-items-center flex-sm">
                                    <div class="header-info-left d-flex align-items-center">

                                        <div class="logo">
                                            <a href="{{ route('show_index') }}"><img
                                                    src="{{ asset('img/logo/logo.png') }}" alt></a>
                                        </div>

                                        <form action="{{ route('search_index') }}" class="form-box" method="POST">
                                            @csrf
                                            <input type="text" name="search" placeholder="Tìm kiếm sách">
                                            <div class="search-icon">
                                                <i class="ti-search"></i>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="header-info-right d-flex align-items-center">
                                        <ul>
                                            <li><a href="#">Đơn mua</a></li>
                                            <li class="shopping-card">

                                                <a href="{{ route('cart.show') }}"><img
                                                        src="{{ asset('img/icon/cart.svg') }}" alt></a>
                                            </li>
                                            @if (Route::has('login'))
                                                @auth
                                                    <li>
                                                        <form action="{{ route('logout') }}" method="post">
                                                            @csrf
                                                            <div class="dropdown">

                                                                <span>{{ Auth::user()->name }}</span>
                                                                <div class="dropdown-content">
                                                                    <a class="dropdown-item d-flex align-items-center"
                                                                        href="{{ route('profile.edit') }}">Profile</a>
                                                                    <a class="dropdown-item d-flex align-items-center"
                                                                        :href="route('logout')"
                                                                        onclick="event.preventDefault();this.closest('form').submit();">
                                                                        {{ __('Đăng xuất') }}
                                                                    </a>

                                                        </form>
                                        </div>
                                    </div>
                                    </li>
                                @else
                                    <li><a href="{{ route('login') }}" class="btn header-btn">Đăng nhập</a>
                                    </li>
                                @endauth
                                @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom  header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12">

                        <div class="main-menu text-center d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="{{ route('show_index') }}">Trang chủ</a></li>
                                    <li><a href="categories.html">Danh mục</a>
                                        <ul class="submenu">
                                            @foreach ($category as $c)
                                                <li><a
                                                        href="{{ route('show_category', ['id' => $c->id]) }}">{{ $c->c_name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="about.html">Giới thiệu</a></li>

                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="contact.html">Liên hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </header>
    <main id="main" class="main">
        @include('templates.error')
        @yield('content')
    </main>
    <footer>
        <div class="footer-wrappper section-bg">
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-3 col-lg-5 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">

                                    <div class="footer-logo mb-25">
                                        <a href="index-2.html"><img src="assets/img/logo/logo2_footer.png" alt></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p>Get the breathing space now, and we’ll extend your term at the other end
                                                year for go.</p>
                                        </div>
                                    </div>

                                    <div class="footer-social">
                                        <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Site Map</h4>
                                    <ul class="mb-20">
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">FAQs</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>


    <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>

    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/price_rangs.js') }}"></script>

    <script src="{{ asset('js/contact.js') }}"></script>
    <script src="{{ asset('js/jquery.form.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/mail-script.js') }}"></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>

    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main-2.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sort').on('change', function() {
                var url = $(this).val()
                if (url) {
                    window.location = url
                }
                return false
            })
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('.add-to-cart').click(function() {
                var id = $(this).data('id');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ route('cart.add') }}',
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token
                    },
                    success: function(data) {
                        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: 'Xem tiếp',
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{ route('cart.show') }}";
                            });
                    }

                })

            })

        })
    </script>
</body>


</html>
