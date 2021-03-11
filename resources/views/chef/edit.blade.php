@extends('layout.dashboard')

@section('title', 'Thêm mới món ăn')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sửa thông tin đầu bếp</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Sửa đầu bếp </li>
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
                            <form id="quickForm" action="{{ route('update_chef', ['id' => $chef->id]) }}" method="Post">
                                @method('put')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tên đầu bếp</label>
                                        <input type="text" name="name" class="form-control" value="{{ $chef->name }}"
                                            id="name" placeholder="Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Ngày sinh</label>
                                        <input type="date" name="birth" class="form-control" value="{{ $chef->birth }}"
                                            id="birth" placeholder="Date">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Số điện thoại</label>
                                        <input type="text" name="phone" class="form-control" value="{{ $chef->phone }}"
                                            id="phone" placeholder="Phone">
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" data-id="{{ $chef->id }}"
                                        class="btn btn-primary btn-edit-chef">Submit</button>
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
                    $('.btn-edit-chef').click(function(e) {
                        e.preventDefault();
                        var name = $('#name').val();
                        var birth = $('#birth').val();
                        var phone = $('#phone').val();

                        var id = $(this).attr('data-id');

                        $.ajax({
                            url: "/chef/update/" + id,
                            method: "POST",
                            data: {
                                name: name,
                                price: birth,
                                phone: phone,
                                _token: "{{ csrf_token() }}",
                                _method: "PUT"
                            },
                            success: function(response) {
                                toastr.success('Cập nhật thành công')
                             }//.then((result2) => {
                            //     if (result2.value) {
                            //         window.location.reload(); // hàm load lại trang của js
                            //     }
                            });
                        })
                    })

    </script>
@endsection
