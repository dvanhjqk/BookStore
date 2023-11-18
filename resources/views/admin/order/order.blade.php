@extends('templates.layout')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Quản lý đơn hàng</h5>

                    <!-- Table with stripped rows -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên người đặt hàng</th>
                                <th scope="col">Tổng giá tiền</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col" colspan="2">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $o)
                                <tr>
                                    <th scope="row">{{ $o->id }}</th>
                                    <td>{{ $o->o_fullname }}</td>
                                    <td>{{ number_format($o->o_total) }}</td>
                                    <td>{{ $o->o_status }}</td>
                                 
                                    <td><button type="button" class="btn btn-success"><a
                                                href="{{ route('order_detail', ['id' => $o->id]) }}">Chi tiết</a></button>
                                    </td>
                                    <td><button type="button" class="btn btn-danger"><a
                                                href="{{ route('order_delete', ['id' => $o->id]) }}"
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