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
          <h5 class="card-title">Sửa nhà cung cấp</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="{{ route('supplier_edit',['id'=>$supplier->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $supplier->id }}">

            <div class="col-12">
              <label class="form-label">Tên</label>
              <input type="text" class="form-control" value="{{ $supplier->sup_name }}" name="sup_name">
            </div>
            <div class="col-12">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" value="{{ $supplier->sup_email }}" name="sup_email">
              </div>
              <div class="col-12">
                <label class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" value="{{ $supplier->sup_address }}" name="sup_address">
              </div>
              <div class="col-12">
                <label class="form-label">Số điện thoại</label>
                <input type="number" class="form-control" value="{{ $supplier->sup_phone }}" name="sup_phone">
              </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Sửa</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- Vertical Form -->

        </div>
      </div>
    @endsection
</body>
</html>