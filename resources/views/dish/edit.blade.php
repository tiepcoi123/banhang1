@extends('layout.dashboard')

@section('title', 'Thêm mới món ăn')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sửa thông tin món ăn</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
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
                            <form id="quickForm" action="{{ route('update_dish', ['dish' => $dish ]) }}" method="Post">
                                @method('put')
                                @csrf
                                @include('partials.errors')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tên món</label>
                                        <input type="text" name="name_dish" class="form-control" value="{{ $dish->name_dish}}" id="exampleInputPassword1"
                                            placeholder="Tên món">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Giá bán</label>
                                        <input type="integer" name="price" class="form-control" value="{{ $dish->price }}" id="exampleInputPassword1"
                                            placeholder="Giá bán">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Đầu bếp nấu </label>
                                        <select class="form-control" name="chef_id" id="exampleFormControlSelect1">
                                            @foreach ($chef as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == $dish->chef_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                     <div class="form-group">
                                        <label for="exampleFormControlSelect1">Danh mục chọn </label>
                                        <select class="form-control multi_category" name="category_id[]" multiple="multiple">
                                            {{-- <option value="">-- Chọn danh mục --</option> --}}
                                            @foreach ($category as $item)
                                            @foreach ($dish->category as $value)
                                                <option value="{{ $item->id }}" {{ $value->id == $item->id ? 'selected' : ''}} >{{ $item->name }}</option>
                                            @endforeach
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
                placeholder: "Chọn danh mục",
            });
        })
      </script>
@endsection
