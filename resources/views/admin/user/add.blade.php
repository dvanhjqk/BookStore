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
                <h5 class="card-title">Thêm mới người dùng</h5>

                <!-- General Form Elements -->
                <form class="row g-3" action="{{ route('user_add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tên</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Địa chỉ email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Số điện thoại</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Địa chỉ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Mật khẩu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="password">
                        </div>
                    </div>
                   
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Avatar</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="image">
                        </div>
                    </div>
                    <input type="hidden" name="status" value="1">

                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>
    @endsection
</body>

</html>
