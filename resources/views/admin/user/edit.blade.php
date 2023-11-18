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
                <h5 class="card-title">Sửa người dùng</h5>

                <!-- General Form Elements -->
                <form class="row g-3" action="{{ route('user_edit', ['id' => $user->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tên</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Địa chỉ email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Số điện thoại</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Địa chỉ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Vai trò</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="role" value="{{ $user->role }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Avatar</label>
                        <img src="{{ $user->image ? '' . Storage::url($user->image) : '' }}" alt="">
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="image">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>
    @endsection
</body>

</html>
