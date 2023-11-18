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
          <h5 class="card-title">Thêm mới mã giảm giá</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="{{ route('coupon_add') }}" method="POST">
            @csrf
            <div class="col-12">
              <label class="form-label">Tên</label>
              <input type="text" class="form-control" name="coupon_name">
            </div>
            <div class="col-12">
                <label class="form-label">Mã</label>
                <input type="text" class="form-control" name="coupon_code">
              </div>
              <div class="col-12">
                <label class="form-label">Số lượng mã</label>
                <input type="number" class="form-control" name="coupon_time">
              </div>
              <div class="col-12">
             
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tính năng mã</label>
                    <div class="col-sm-10">
                      <select class="form-select" name="coupon_condition" aria-label="Default select example">
                        <option selected>Chọn</option>
                        <option value="1">Giảm theo phần trăm</option>
                        <option value="2">Giảm theo tiền</option>
                      </select>
                    </div>
                  </div>
              </div>
              <div class="col-12">
                <label class="form-label">Số % hoặc tiền giảm</label>
                <input type="text" class="form-control" name="coupon_number">
              </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary">Thêm</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- Vertical Form -->

        </div>
      </div>
    @endsection
</body>
</html>