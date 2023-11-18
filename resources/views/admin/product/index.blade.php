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
                            <h5 class="card-title">Sách</h5>
                            <button type="button" class="btn btn-primary"><a href="{{ route('product_add') }}">Thêm
                                mới</a></button>
                            <!-- Table with stripped rows -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên sách</th>
                                        <th scope="col">Giá tiền</th>
                                        <th scope="col">Giá khuyến mãi</th>
                                        <th scope="col">Ảnh bìa</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Nội dung</th>
                                        <th scope="col">Danh mục</th>
                                        <th scope="col">Nhà sản xuất</th>
                                        <th scope="col">Nhà cung cấp</th>
                                        <th scope="col">Tác giả</th>
                                        <th scope="col" colspan="2">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $pro)
                                        <tr>
                                            <th scope="row">{{ $pro->id }}</th>
                                            <td>{{ $pro->pro_name }}</td>
                                            <td>{{ $pro->pro_price }}</td>
                                            <td>{{ $pro->pro_price_sale }}</td>
                                            <td><img src="{{ $pro->image ? '' . Storage::url($pro->image) : '' }}"
                                                    style="width: 100px" /></td>
                                            <td>{{ $pro->pro_stock }}</td>
                                            <td>{{ $pro->pro_status }}</td>
                                            <td>{{ $pro->pro_description }}</td>
                                            @foreach ($category as $c)
                                                @if ($c->id == $pro->pro_category_id)
                                                    <td>{{ $c->c_name }}</td>
                                                @endif
                                            @endforeach
                                            @foreach ($publisher as $p)
                                                @if ($p->id == $pro->pro_publisher_id)
                                                    <td>{{ $p->p_name }}</td>
                                                @endif
                                            @endforeach
                                            @foreach ($supplier as $sup)
                                                @if ($sup->id == $pro->pro_supplier_id)
                                                    <td>{{ $sup->sup_name }}</td>
                                                @endif
                                            @endforeach
                                            @foreach ($author as $a)
                                                @if ($a->id == $pro->pro_author_id)
                                                    <td>{{ $a->a_name }}</td>
                                                @endif
                                            @endforeach
                                            <td><button type="button" class="btn btn-success"><a
                                                        href="{{ route('product_edit', ['id' => $pro->id]) }}">Sửa</a></button>
                                            </td>
                                            <td><button type="button" class="btn btn-danger"><a
                                                        href="{{ route('product_delete', ['id' => $pro->id]) }}"
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
                {{ $product->links() }}
            </div>
        </section>
    @endsection
