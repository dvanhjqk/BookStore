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
                            <h5 class="card-title">Danh sách bình luận</h5>
                            <!-- Table with stripped rows -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nội dung</th>
                                        <th scope="col">Tên sách</th>
                                        <th scope="col">Người bình luận</th>
                                        <th scope="col">Ngày đăng</th>
                                        <th scope="col" colspan="2">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comment as $c)
                                        <tr>
                                            <th scope="row">{{ $c->id }}</th>
                                            <td>{{ $c->com_content }}</td>
                                            @foreach ($product as $p)
                                                @if ($p->id == $c->com_product_id)
                                                    <td>{{ $p->pro_name }}</td>
                                                @endif
                                            @endforeach
                                            @foreach ($user as $u)
                                                @if ($u->id == $c->com_user_id)
                                                    <td>{{ $u->name }}</td>
                                                @endif
                                            @endforeach
                                            <td>{{ $c->created_at }}</td>
                                            <td><button type="button" class="btn btn-danger"><a
                                                        href="{{ route('com_delete', ['id' => $c->id]) }}"
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
