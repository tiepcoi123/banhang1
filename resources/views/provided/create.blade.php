@extends('layout.main')
@section('title', 'Thêm mới chuỗi cung ứng')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm mới chuỗi cung ứng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Thêm mới chuỗi cung ứng</li>
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
                            <form id="quickForm" action="{{ route('store_provided') }}" method="POST">
                                @include('partials.success')
                                @include('partials.errors')
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Tên chuỗi cung ứng</label>
                                                <input type="text" name="name" class="form-control" id="exampleInputEmail1">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Sản phẩm cung ứng</label>
                                                <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                                                    <option value="">-- Chọn danh mục --</option>
                                                    @foreach ($category as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="price">Tiền nhập hàng</label>
                                                <input type="int" name="price" class="form-control"
                                                    id="exampleInputPassword1">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="amount">Số lượng sản phẩm cung ứng (kg)</label>
                                                <input type="int" name="amount" class="form-control"
                                                    id="exampleInputPassword1">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="note">Ghi chú</label>
                                                <input type="text" class="form-control note_promotion"
                                                    name="note" placeholder="Ghi chú thêm vào đây">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="time_start">Thời gian nhận hàng</label>
                                                <input type="date" class="form-control" name="time_start">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="time_end">Thời gian hết hạn</label>
                                                <input type="date" class="form-control" name="time_end">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        $(document).ready(function() {
            $('.multi_category').select2({
                minimumResultsForSearch: -1,
                placeholder: "Chọn danh mục",
            });
        })

    </script>
@endsection
