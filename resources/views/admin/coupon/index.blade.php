<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @extends('templates.layout')
    @section('content')
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Danh sách mã giảm giá</h5>
                            <button type="button" class="btn btn-primary"><a href="{{ route('coupon_add') }}">Thêm
                                mới</a></button>
                            <!-- Table with stripped rows -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Mã</th>
                                        <th scope="col">Số lượng mã</th>
                                        <th scope="col">Tính năng mã</th>
                                        <th scope="col">Số % hoặc tiền giảm</th>
                                        <th scope="col" colspan="2">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupon as $c)
                                        <tr>
                                            <th scope="row">{{ $c->id }}</th>
                                            <td>{{ $c->coupon_name }}</td>
                                            <td>{{ $c->coupon_code }}</td>
                                            <td>{{ $c->coupon_time }}</td>
                                            <td>
                                                @if ($c->coupon_condition == 1)
                                                    Giảm giá theo %
                                                @else
                                                    Giảm giá theo tiền
                                              
                                                @endif
                                            </td>
                                            <td>{{ $c->coupon_number }}</td>
                                           
                                            <td><button type="button" class="btn btn-danger"><a
                                                        href="{{ route('coupon_delete', ['id' => $c->id]) }}"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                         

                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endsection
