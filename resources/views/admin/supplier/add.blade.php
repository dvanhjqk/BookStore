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
                <h5 class="card-title">Thêm mới nhà cung cấp</h5>

                <!-- Vertical Form -->
                <form class="row g-3" action="{{ route('supplier_add') }}" method="POST">
                    @csrf
                    <div class="col-12">
                        <label class="form-label">Tên</label>
                        <input type="text" class="form-control" name="sup_name" value="{{ old('sup_name') }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="sup_email" value="{{ old('sup_email') }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" name="sup_address" value="{{ old('sup_address') }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Số điện thoại</label>
                        <input type="number" class="form-control" name="sup_phone" value="{{ old('sup_phone') }}">
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
