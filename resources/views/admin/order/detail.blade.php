
@extends('templates.layout')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Thông tin khách hàng</h5>

                    <!-- Table with stripped rows -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tên</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Email</th>
                                <th scope="col">Địa chỉ</th>          
                            </tr>
                        </thead>
                        <tbody>
                          
                                <tr>
                                
                                    <td>{{$detail->name }}</td>
                                    <td>{{$detail->phone }}</td>
                                    <td>{{$detail->email }}</td>
                                    <td>{{$detail->address }}</td>
                             
                                   
                                </tr>
                           
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                  
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Thông tin vận chuyển</h5>

                    <!-- Table with stripped rows -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tên người đặt</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Email</th>
                                <th scope="col">Địa chỉ</th>  
                                <th scope="col">Ghi chú</th>  
                                <th scope="col">Hình thức thanh toán</th>  
                            </tr>
                        </thead>
                        <tbody>
                           
                                <tr>
                                    <td>{{ $detail->o_fullname }}</td>
                                    <td>{{ $detail->o_email }}</td>
                                    <td>{{ $detail->o_phone }}</td>
                                    <td>{{ $detail->o_address }}</td>
                                    <td>{{ $detail->o_note }}</td>
                                    @if( $detail->p_type  ==1)
                                    <td>Thanh toán bằng ngân hàng</td>
                                        @else
                                    <td>Thanh toán khi nhận hàng</td>
                                        @endif
                                </tr>
            
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                  
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Chi tiết đơn hàng</h5>

                    <!-- Table with stripped rows -->
                    <table class="table">
                        <thead>
                            
                            <tr>
                            
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá</th>
                            
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detail_product as $d)
                            @php
                                $total =  $d->od_price * $d->od_quantity  ;

                            @endphp
                                <tr>
                                    <td>{{ $d->od_product_name }}</td>
                                    <td>{{ $d->od_quantity }}</td>
                                    <td>{{number_format($total)  }}</td>
                              
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
