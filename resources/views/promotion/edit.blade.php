@extends('layout.main')
@section('title', 'Chỉnh sửa khuyến mại')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Chỉnh sửa khuyến mại</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Chỉnh sửa khuyến mại</li>
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

                            <div class="card-body">
                                @if ($promotion->type == 0)
                                <form action="{{route('update_promotion', ['promotion' => $promotion ]) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Tên khuyến mại</label>
                                                <input type="text" class="form-control" name="name" value="{{ $promotion->name }}"
                                                    placeholder="Nhập tên khuyến mại">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="count_apply">Số lần áp dụng khuyến mại</label>
                                                <input type="number" class="form-control count_apply_promotion" name="count_apply" {{ $promotion->count_apply == null ? 'disabled' : '' }}  value="{{ $promotion->count_apply }}"
                                                    placeholder="Số lượt áp dụng khuyến mại">
                                                    <div class="form-group clearfix" style="margin-top:15px">
                                                        <div class="icheck-primary d-inline">
                                                            <input type="checkbox" {{ $promotion->count_apply == null ? 'checked' : '' }} name="never_apply " id="never_apply">
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
                                                <input type="number" class="form-control" name="discount"  value="{{ $promotion->discount }}"
                                                    placeholder="Nhập phần trăm khuyến mại">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="start_date">Ngày bắt đầu KM</label>
                                                <input type="date" class="form-control" name="start_date"  value="{{ $promotion->start_date }}">
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="code">Mã khuyến mại</label>
                                                <a href="" style="float: right">Tạo mã tự động</a>
                                                <input type="text" class="form-control" name="code"  value="{{ $promotion->code }}"
                                                    placeholder="Nhập mã khuyến mại">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="end_date">Ngày kết thúc KM</label>
                                                <input type="date" class="form-control end_date_promotion"  name="end_date" {{ $promotion->end_date == null ? 'disabled' : '' }}  value="{{ $promotion->end_date }}"
                                                    placeholder="Nhập ngày kết thúc khuyến mại">
                                                <div class="form-group clearfix" style="margin-top:15px">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" {{ $promotion->end_date == null ? 'checked' : '' }} name="never_expire" id="never_expire">
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
                                @else
                                    <form action="{{route('update_promotion', ['promotion' => $promotion ]) }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Tên khuyến mại</label>
                                                    <input type="text" class="form-control" name="name"  value="{{ $promotion->name }}"
                                                        placeholder="Nhập tên khuyến mại">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="start_date">Ngày bắt đầu</label>
                                                    <input type="date" class="form-control" name="start_date" value="{{ $promotion->start_date }}"
                                                        placeholder="Nhập ngày bắt đầu khuyến mại">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Phần trăm khuyến mại (%) </label>
                                                    <input type="number" class="form-control" name="discount" value="{{ $promotion->discount }}"
                                                        placeholder="Nhập phần trăm khuyến mại">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="end_date">Ngày kết thúc KM</label>
                                                    <input type="date" class="form-control end_date_promotion_2" name="end_date" {{ $promotion->end_date == null ? 'disabled' : '' }}  value="{{ $promotion->end_date }}"
                                                        placeholder="Nhập ngày kết thúc khuyến mại">
                                                    <div class="form-group clearfix" style="margin-top:15px">
                                                        <div class="icheck-primary d-inline">
                                                            <input type="checkbox" {{ $promotion->end_date == null ? 'checked' : '' }} id="never_expire-2">
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
                                @endif
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
            })
        })
    </script>
@endsection
