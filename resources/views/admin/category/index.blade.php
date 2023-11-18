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
                            <h5 class="card-title">Danh mục sản phẩm</h5>
                            <button type="button" class="btn btn-primary"><a href="{{ route('category_add') }}">Thêm
                                mới</a></button>
                            <!-- Table with stripped rows -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col" colspan="2">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $c)
                                        <tr>
                                            <th scope="row">{{ $c->id }}</th>
                                            <td>{{ $c->c_name }}</td>
                                            <td><button type="button" class="btn btn-success"><a
                                                        href="{{ route('category_edit', ['id' => $c->id]) }}">Sửa</a></button>
                                            </td>
                                            <td><button type="button" class="btn btn-danger"><a
                                                        href="{{ route('category_delete', ['id' => $c->id]) }}"
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
