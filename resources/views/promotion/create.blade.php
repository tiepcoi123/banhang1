@extends('layout.main')
@section('title', 'Thêm mới món ăn')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm mới món ăn</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Thêm mới món ăn</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            @include('partials.success')
                            @include('partials.errors')
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                        role="tab" aria-controls="nav-home" aria-selected="true">Khuyến mại có mã</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                        role="tab" aria-controls="nav-profile" aria-selected="false">Khuyến mại thường</a>
                                </div>
                            </nav>
                            <div class="card-body">
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- Khuyến mại có mã -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <form action="{{route('store_promotion')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Tên khuyến mại</label>
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Nhập tên khuyến mại">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="count_apply">Số lần áp dụng khuyến mại</label>
                                                        <input type="number" class="form-control count_apply_promotion" name="count_apply"
                                                            placeholder="Số lượt áp dụng khuyến mại">
                                                            <div class="form-group clearfix" style="margin-top:15px">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" name="never_apply " id="never_apply">
                                                                    <label for="never_apply">
                                                                        Không giới hạn số lượt áp dụng
                                                                    </label>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Phần trăm khuyến mại (%) </label>
                                                        <input type="number" class="form-control" name="discount"
                                                            placeholder="Nhập phần trăm khuyến mại">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="start_date">Ngày bắt đầu KM</label>
                                                        <input type="date" class="form-control" name="start_date">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="code">Mã khuyến mại</label>
                                                        <a href="javascript:void(0)" id="generate_code" style="float: right">Tạo mã tự động</a>
                                                        <input type="text" class="form-control coupon_code" name="code"
                                                            placeholder="Nhập mã khuyến mại">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="end_date">Ngày kết thúc KM</label>
                                                        <input type="date" class="form-control end_date_promotion" name="end_date"
                                                            placeholder="Nhập ngày kết thúc khuyến mại">
                                                        <div class="form-group clearfix" style="margin-top:15px">
                                                            <div class="icheck-primary d-inline">
                                                                <input type="checkbox" name="never_expire" id="never_expire">
                                                                <label for="never_expire">
                                                                    Không bao giờ hết hạn
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" value="0" name="type">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                    <!-- Kết thúc khuyến có mã -->

                                    <!-- Khuyến mại thường -->
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <form action="{{route('store_promotion')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Tên khuyến mại</label>
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Nhập tên khuyến mại">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="start_date">Ngày bắt đầu</label>
                                                        <input type="date" class="form-control" name="start_date"
                                                            placeholder="Nhập ngày bắt đầu khuyến mại">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Phần trăm khuyến mại (%) </label>
                                                        <input type="number" class="form-control" name="discount"
                                                            placeholder="Nhập phần trăm khuyến mại">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="end_date">Ngày kết thúc KM</label>
                                                        <input type="date" class="form-control end_date_promotion_2" name="end_date"
                                                            placeholder="Nhập ngày kết thúc khuyến mại">
                                                        <div class="form-group clearfix" style="margin-top:15px">
                                                            <div class="icheck-primary d-inline">
                                                                <input type="checkbox" id="never_expire-2">
                                                                <label for="never_expire-2">
                                                                    Không bao giờ hết hạn
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" value="1" name="type">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                    <!--Kết thúc khuyến mại thường -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        $(document).ready(function(){
            $('#never_expire').change(function(){
                if ($(this).is(":checked")) {
                    $('.end_date_promotion').prop('disabled', true);
                }
                else{
                    $('.end_date_promotion').prop('disabled', false);
                }
            });

            $('#never_expire-2').change(function(){
                if ($(this).is(":checked")) {
                    $('.end_date_promotion_2').prop('disabled', true);
                }
                else{
                    $('.end_date_promotion_2').prop('disabled', false);
                }
            });

            $('#never_apply').change(function(){
                if ($(this).is(":checked")) {
                    $('.count_apply_promotion').prop('disabled', true);
                }
                else{
                    $('.count_apply_promotion').prop('disabled', false);
                }
            });

            $('#generate_code').click(function(){
                $.ajax({
                    url: "{{ route('generate_code') }}",
                    success: function(response){
                        $('.coupon_code').val(response.data);
                    }
                });
            });
        })
    </script>
@endsection
