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
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Sửa sản phẩm</h5>
            <form class="row g-3" action="{{ route('product_edit',['id'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tên sách</label>
                    <input type="text" value="{{ $product->pro_name }}" name="pro_name" class="form-control">
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Ảnh</label>
                    <img src="{{ $product->image ? '' . Storage::url($product->image) : '' }}" alt="">
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="image">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Giá tiền</label>
                    <input type="text" name="pro_price" value="{{ $product->pro_price }}" class="form-control">
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Giá khuyến mãi</label>
                    <input type="text" name="pro_price_sale" value="{{ $product->pro_price_sale }}" class="form-control">
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Số lượng</label>
                    <input type="number" name="pro_stock" value="{{ $product->pro_stock }}"class="form-control">
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Trạng thái</label>
                    <input type="text" name="pro_status" value="Còn hàng" class="form-control">
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nội dung</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" style="height: 100px" name="pro_description">{{ $product->pro_description }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Danh mục</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="pro_category_id">
                            <option value="">Chọn danh mục</option>
                            @if (!empty($category))
                                {
                                @foreach ($category as $c)
                                    <option value="{{ $c->id }}"
                                        {{ old('pro_category_id') == $c->id || $product->pro_category_id == $c->id ? 'selected' : false }}>
                                        {{ $c->c_name }}</option>
                                @endforeach
                            @endif
                            }
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nhà sản xuất</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="pro_publisher_id">
                            <option value="">Chọn nhà sản xuất</option>
                            @if (!empty($publisher))
                                {
                                @foreach ($publisher as $p)
                                    <option value="{{ $p->id }}"
                                        {{ old('pro_publisher_id') == $p->id || $product->pro_publisher_id == $p->id ?  'selected' : false }}>
                                        {{ $p->p_name }}</option>
                                @endforeach
                            @endif
                            }
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nhà cung cấp</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="pro_supplier_id">
                            <option value="">Chọn nhà cung cấp</option>
                            @if (!empty($supplier))
                                {
                                @foreach ($supplier as $sup)
                                    <option value="{{ $sup->id }}"
                                        {{ old('pro_supplier_id') == $sup->id || $product->pro_supplier_id == $sup->id ? 'selected' : false }}>
                                        {{ $sup->sup_name }}</option>
                                @endforeach
                            @endif
                            }
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tác giả</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="pro_author_id">
                            <option value="">Chọn tác giả</option>
                            @if (!empty($author))
                                {
                                @foreach ($author as $a)
                                    <option value="{{ $a->id }}"
                                        {{ old('pro_author_id') == $a->id || $product->pro_author_id == $a->id ? 'selected' : false }}>
                                        {{ $a->a_name }}</option>
                                @endforeach
                            @endif
                            }
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
        
    @endsection
</body>

</html>
