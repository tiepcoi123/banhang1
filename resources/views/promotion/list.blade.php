@extends('layout.main')
@section('title', 'Danh sách món ăn')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách KM</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Danh sách KM</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <strong>{{ Session::get('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                            @endif
                            <div class="card-header">
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên khuyến mại </th>
                                            <th>Loại khuyến mại</th>
                                            <th>Mã khuyến mại </th>
                                            <th>Số lượt sử dụng </th>
                                            <th>Thời gian bắt đầu </th>
                                            <th>Thời gian kết thúc </th>
                                            <th>Giá khuyến mại</th>
                                            <th>Ngày tạo</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getData as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->type == 0 ? 'Khuyến mại có mã' : 'Khuyến mại thường' }}</td>
                                                <td>{{ $item->code}}</td>
                                                <td>{{ $item->count_apply}}</td>
                                                <td>{{ $item->start_date}}</td>
                                                <td>{{ $item->end_date}}</td>
                                                <td>{{ $item->discount}}</td>
                                                <td>{{ date('d-m-Y H:i', strtotime($item->created_at))  }}</td>
                                                <td>
                                                    <a href="{{ route('edit_promotion', ['promotion' => $item]) }}"
                                                        class="btn btn-warning btn_edit">Sửa</a>
                                                    <form action="{{ route('delete_promotion', ['promotion' => $item]) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </form>
                                                </td>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="card-footer clearfix">
                                    {{ $getData->links('layout.pagination') }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
<style>
    .btn_edit {
        float: left;
        margin-right: 10px;
    }
</style>