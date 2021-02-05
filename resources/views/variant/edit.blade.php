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
                            <form id="quickForm" action="{{ route('update_variant', ['variant' => $variant ]) }}" method="Post">
                                @method('put')
                                @csrf
                                @include('partials.errors')

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Tên món </label>
                                    <select class="form-control" name="dish_id" id="exampleFormControlSelect1">
                                        @foreach ($dish as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $variant->dish_id ? 'selected' : '' }}>{{ $item->name_dish }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Giá bán</label>
                                        <input type="integer" name="price" class="form-control" val="{{ $variant->price }}" id="exampleInputPassword1"
                                            placeholder="Giá bán">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Số lượng</label>
                                        <input type="integer" name="quantity" class="form-control" value="{{ $variant->quantity }}" id="exampleInputPassword1"
                                            placeholder="Giá bán">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">giá trị </label>
                                        <select class="form-control multi_category" name="value_id[]" multiple="multiple">
                                          
                                            @foreach ($value as $item)
                                            @foreach ($variant->value as $val)
                                                <option value="{{ $item->id }}" {{ $val->id == $item->id ? 'selected' : ''}} >{{ $item->name }}</option>
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
