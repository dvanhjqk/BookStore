<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="dashboard" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Admin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->


        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                 
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
        

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                            <a class="dropdown-item d-flex align-items-center" :href="route('logout')"  onclick="event.preventDefault();this.closest('form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                <span> {{ __('Log Out') }}</span>
                            </a>
                        </form>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link" href="dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('category_index') }}">
                    <i class="bi bi-menu-button-wide"></i>
                    <span>Danh mục</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('product_index') }}">
                    <i class="bi bi-book"></i>
                    <span>Sản phẩm</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('author_index') }}">
                    <i class="bi bi-person-circle"></i>
                    <span>Tác giả</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('publisher_index') }}">
                  <i class="bi bi-printer-fill"></i>
                    <span>Nhà xuất bản</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('supplier_index') }}">
                  <i class="bi bi-house-fill"></i>
                    <span>Nhà cung cấp</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('user_index') }}">
                    <i class="bi bi-person"></i>
                    <span>User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('order_index') }}">
                    <i class="bi bi-cart4"></i>
                    <span>Đơn hàng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('comment_index') }}">
                    <i class="bi bi-card-text"></i>
                    <span>Bình luận</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('coupon_index') }}">
                    <i class="ri-coupon-2-line"></i>
                    <span>Mã giảm giá</span>
                </a>
            </li>
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        @include('templates.error')
        @yield('content')
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            <strong><span>Đoàn Việt Anh</span></strong>. PH27867
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
