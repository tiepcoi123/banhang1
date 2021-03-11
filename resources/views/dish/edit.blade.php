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
                            <form id="quickForm" action="{{ route('update_dish', ['id' => $dish->id ]) }}" method="Post">
                                @method('put')
                                @csrf
                                @include('partials.errors')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tên món</label>
                                        <input type="text" name="name_dish" class="form-control" value="{{ $dish->name_dish}}" id="name_dish"
                                            placeholder="Tên món">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Giá bán</label>
                                        <input type="integer" name="price" class="form-control" value="{{ $dish->price }}" id="price"
                                            placeholder="Giá bán">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Đầu bếp nấu </label>
                                        <select class="form-control" name="chef_id" id="chef_id">
                                            @foreach ($chef as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == $dish->chef_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                     <div class="form-group">
                                        <label for="exampleFormControlSelect1">Danh mục chọn </label>
                                        <select class="form-control multi_category" name="category_id[]" multiple="multiple" id="category_id">
                                            @foreach ($category as $item)
                                            @foreach ($dish->category as $val)
                                            <option value="{{ $item->id }}" {{ $val->id == $item->id ? 'selected' : ''}} >{{ $item->name }}</option>
                                            @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                    @foreach ($attribute as $attr)
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Size </label>
                                        @foreach ($attr->value as $item)
                                        <div class="form-check">
                                            <input class="form-check-input value_id"  type="checkbox" @foreach ($dish->value as $val) {{ $val->id == $item->id ? 'checked' : '' }}  @endforeach  name="value_id[{{$attr->id}}][]" value="{{ $item->id }}"  >
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{ $item->name }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endforeach
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="button" data-id="{{ $dish->id }}" class="btn btn-primary btn-edit-dish" id="btn-edit-dish">Submit</button>
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

            $('.multi_value').select2({
                placeholder: "Chọn giá trị",
            });

            $('#btn-edit-dish').click(function() {
                var name_dish = $('#name_dish').val();
                var price = $('#price').val();
                var chef_id = $('#chef_id').val();
                var category_id = JSON.stringify($('#category_id').val());
                var value_id = $("input[type='checkbox']").val();
                console.log(value_id);
                return;
                var id = $(this).attr('data-id');

                $.ajax({
                    url: "/dish/update/" + id,
                    method: "POST",
                    data: {
                        name_dish : name_dish,
                        price : price,
                        chef_id : chef_id,
                        value_id : value_id,
                        category_id : category_id,
                        _token: "{{ csrf_token() }}",
                        _method: "PUT"
                    },
                    success: function(response) {
                        toastr.success('Cập nhật thành công')
                    }
                });
            })
        })
      </script>
@endsection
