@extends('layout.main')
@section('title', 'Thêm mới nhân viên')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm mới nhân viên</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Thêm mới nhân viên</li>
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
                            <form id="quickForm" action="{{ route('store_staff') }}" method="POST">
                                @include('partials.success')
                                @include('partials.errors')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Tên nhân viên</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputPassword1">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" name="phone" class="form-control"
                                                    id="exampleInputPassword1">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="level">Level</label>
                                                <input type="number" class="form-control level_promotion"
                                                    name="level" placeholder="Cấp độ CNV">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="birth">Ngày sinh tháng đẻ</label>
                                                <input type="date" class="form-control" name="birth">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="start_job">Ngày bắt đầu làm việc</label>
                                                <input type="date" class="form-control" name="start_job">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="exampleFormControlSelect1">Danh mục chọn </label>
                                        <select class="form-control multi_category" name="category_id[]"
                                            multiple="multiple">
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}

                                    {{-- @foreach ($attribute as $attr)
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Size </label>
                                        @foreach ($attr->value as $item)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="value_id[{{ $attr->id }}][]" value="{{ $item->id }}" >
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{ $item->name }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endforeach --}}
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
        $(document).ready(function() {
            $('.multi_category').select2({
                minimumResultsForSearch: -1,
                placeholder: "Chọn danh mục",
            });
        })

    </script>
@endsection
