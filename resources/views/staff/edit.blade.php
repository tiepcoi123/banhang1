@extends('layout.dashboard')

@section('title', 'Thêm mới nhân viên ăn')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sửa thông tin nhân viên ăn</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Sửa đầu bếp </li>
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
                            <form id="quickForm" action="{{ route('update_staff', ['staff' => $staff]) }}" method="Post">
                                @method('put')
                                @csrf
                                @include('partials.errors')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tên nhân viên</label>
                                        <input type="text" name="name" class="form-control" value="{{ $staff->name }}"
                                            id="exampleInputPassword1" placeholder="Tên nhân viên">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="integer" name="email" class="form-control"
                                            value="{{ $staff->email }}" id="exampleInputPassword1" placeholder="Email">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Phone</label>
                                                <input type="integer" name="phone" class="form-control"
                                                    value="{{ $staff->phone }}" id="exampleInputPassword1"
                                                    placeholder="Phone">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="level">Level</label>
                                                <input type="number" class="form-control level_staff"
                                                    name="level" value="{{ $staff->level }}"
                                                    placeholder="Số lượt áp dụng khuyến mại">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Ngày sinh nhân viên </label>
                                                <input type="date" class="form-control" name="birth"  value="{{ $staff->birth }}"
                                                    placeholder="Nhập phần trăm khuyến mại">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="start_job">Ngày bắt đầu làm việc</label>
                                                <input type="date" class="form-control" name="start_job"  value="{{ $staff->start_job }}">
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
                    <div class="col-md-6">

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
