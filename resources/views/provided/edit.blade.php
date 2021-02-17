@extends('layout.dashboard')

@section('title', 'Chỉnh sửa chuỗi cung ứng')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sửa thông tin chuỗi cung ứng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Sửa chuỗi cung ứng </li>
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
                            <form id="quickForm" action="{{ route('update_provided', ['provided' => $provided]) }}"
                                method="Post">
                                @method('put')
                                @csrf
                                @include('partials.errors')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tên chuỗi cung ứng</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $provided->name }}" id="exampleInputPassword1"
                                                    placeholder="Tên chuỗi cung ứng">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Tên sản phẩm cung ứng</label>
                                                <select class="form-control" name="category_id"
                                                    id="exampleFormControlSelect1">
                                                    @foreach ($category as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $item->id == $provided->category_id ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Số lượng sản phẩm cung ứng</label>
                                                <input type="int" name="amount" class="form-control"
                                                    value="{{ $provided->amount }}" id="exampleInputPassword1"
                                                    placeholder="Số lượng sản phẩm cung ứng">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Price</label>
                                                <input type="number" name="price" class="form-control"
                                                    value="{{ $provided->price }}" id="exampleInputPassword1"
                                                    placeholder="price">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Ngày bắt đầu nhập hàng </label>
                                                <input type="date" class="form-control" name="time_start"
                                                    value="{{ $provided->time_start }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="time_end">Ngày hàng hết hạn</label>
                                                <input type="date" class="form-control" name="time_end"
                                                    value="{{ $provided->time_end }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Ghi chú</label>
                                                <input type="text" name="note" class="form-control"
                                                    value="{{ $provided->note }}" id="exampleInputPassword1"
                                                    placeholder="Ghi chú">
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
                placeholder: "Chọn danh mục",
            });
        })
        $(document).ready(function() {
            $('.multi_value').select2({
                placeholder: "Chọn giá trị",
            });
        })

    </script>
@endsection
