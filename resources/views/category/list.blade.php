@extends('layout.main')
@section('title', 'Danh sách món ăn')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách món ăn</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Danh sách món ăn</li>
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
                                            <th>Category - name</th>
                                            <th>Ngày tạo</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getData as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                {{-- <td>
                                                    {{ $item->category_id != null ? get_name_category_by_id($item->category_id) : null }}
                                                </td> --}}
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('edit_category', ['category' => $item]) }}"
                                                        class="btn btn-warning btn_edit" type="Sửa" ><i style="color: #FFF" class="fas fa-edit"></i></a>

                                                    <button type="submit" class="btn btn-danger btn-delete-category"
                                                        data-id="{{ $item->id }}" title="Xóa"><i class="fas fa-trash"></i>
                                                    </button>

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
    <script>
        $(document).ready(function() {
            $('.btn-delete-category').click(function() {
                var id = $(this).attr('data-id');

                Swal.fire({
                    title: 'Bạn có chắc chắn thực hiện hành động',
                    text: "Hành động của bạn sẽ không thể hoàn tác",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Có, xóa bản ghi!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/category/delete/" + id,
                            method: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                _method: "DELETE"
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                ).then((result2) => {
                                    if (result2.value) {
                                        window.location
                                    .reload(); // hàm load lại trang của js
                                    }
                                });
                            }
                        });
                    }
                })
            })
        });

    </script>
@endsection
<style>
    .btn_edit {
        float: left;
        margin-right: 10px;
    }

</style>
