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
                <h5 class="card-title">Tác giả</h5>

                <!-- General Form Elements -->
                <form class="row g-3" action="{{ route('author_edit', ['id' => $author->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tên</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="a_name" value="{{ $author->a_name }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Ảnh</label>
                        <img src="{{ $author->image ? '' . Storage::url($author->image) : '' }}" alt="">
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="image">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Thông tin</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" style="height: 100px" name="a_info">{{ $author->a_info }}</textarea>
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
