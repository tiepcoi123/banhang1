@extends('layout.dashboard')

@section('title', 'Thêm mới giá trị')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sửa thông tin giá trị</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Sửa Value </li>
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
                            <form id="quickForm" action="{{ route('update_value', ['value' => $value ]) }}" method="Post">
                                @method('put')
                                @csrf
                                @include('partials.errors')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tên giá trị</label>
                                        <input type="text" name="name" class="form-control" value="{{ $value->name}}" id="exampleInputPassword1"
                                            placeholder="Tên món">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1"> Thuộc tính </label>
                                        <select class="form-control" name="attribute_id" id="exampleFormControlSelect1">
                                            @foreach ($attribute as $item)
                                                <option value ="{{ $item->id }}" {{ $item->id == $value->attribute_id ? 'selected' : '' }}>{{ $item->name }}</option>
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
@endsection
