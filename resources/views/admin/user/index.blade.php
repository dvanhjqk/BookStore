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
                            <h5 class="card-title">Người dùng</h5>
                            <button type="button" class="btn btn-primary"><a href="{{ route('user_add') }}">Thêm
                                mới</a></button>

                            <!-- Table with stripped rows -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Địa chỉ</th>
                                        <th scope="col">Ảnh</th>
                                        <th scope="col">Vai trò</th>
                                        <th scope="col" colspan="2">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $u)
                                        <tr>
                                            <th scope="row">{{ $u->id }}</th>
                                            <td>{{ $u->name }}</td>
                                            <td>{{ $u->email }}</td>
                                            <td>{{ $u->phone }}</td>
                                            <td>{{ $u->address }}</td>
                                            <td><img src="{{ $u->image ? '' . Storage::url($u->image) : '' }}"
                                                    style="width: 200px"></td>
                                            <td>@if ($u->role == 0)
                                                Người dùng
                                                @else
                                                Admin
                                            @endif
                                               </td>
                                            <td><button type="button" class="btn btn-success"><a
                                                        href="{{ route('user_edit', ['id' => $u->id]) }}">Sửa</a></button>
                                            </td>
                                            <td><button type="button" class="btn btn-danger"><a
                                                        href="{{ route('user_delete', ['id' => $u->id]) }}"
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
