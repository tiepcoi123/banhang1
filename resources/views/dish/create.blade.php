@extends('layout.main')
@section('title', 'Thêm mới món ăn')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
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
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="{{ route('store_dish') }}" method="POST">
                                @include('partials.success')
                                @include('partials.errors')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name_dish">Tên món</label>
                                        <input type="text" name="name_dish" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Giá bán</label>
                                        <input type="text" name="price" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Đầu bếp nấu </label>
                                        <select class="form-control" name="chef_id" id="exampleFormControlSelect1">
                                            <option value="">-- Chọn đầu bếp --</option>
                                            @foreach ($chef as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Danh mục chọn </label>
                                        <select class="form-control multi_category" name="category_id[]" multiple="multiple">
                                            {{-- <option value="">-- Chọn danh mục --</option> --}}
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        $(document).ready(function(){
            $('.multi_category').select2({
                minimumResultsForSearch: -1,
                placeholder: "Chọn danh mục",
            });
        })
    </script>
@endsection