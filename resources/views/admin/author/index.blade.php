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
                            <h5 class="card-title">Tác giả</h5>
                            <button type="button" class="btn btn-primary"><a href="{{ route('author_add') }}">Thêm
                                mới</a></button>

                            <!-- Table with stripped rows -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Thông tin</th>
                                        <th scope="col">Ảnh</th>
                                        <th scope="col" colspan="2">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($author as $a)
                                        <tr>
                                            <th scope="row">{{ $a->id }}</th>
                                            <td>{{ $a->a_name }}</td>
                                            <td>{{ $a->a_info }}</td>
                                            <td><img src="{{ $a->image ? '' . Storage::url($a->image) : '' }}"
                                                    style="width: 200px"></td>

                                            <td><button type="button" class="btn btn-success"><a
                                                        href="{{ route('author_edit', ['id' => $a->id]) }}">Sửa</a></button>
                                            </td>
                                            <td><button type="button" class="btn btn-danger"><a
                                                        href="{{ route('author_delete', ['id' => $a->id]) }}"
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
