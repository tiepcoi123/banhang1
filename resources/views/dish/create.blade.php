@extends('layout.dashboard')

@section('title', 'Thêm mới món ăn')

@section('content')
<section class="wrapper">
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                 Thêm mới món ăn
            </header>
        <div class="panel-body">
                <form class="form-horizontal bucket-form" action="{{ url('create') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="namedish">Tên món ăn</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control"  name="namedish" maxlength="255" />
                          
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="money">Giá cả</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="money" maxlength="15"  />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="namechef">Đầu bếp chế biến</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="namechef" maxlength="15"  />
                        </div>
                    </div>
                    
                    <center><button type="submit" class="btn btn-primary">Thêm món</button></center>
                </form>
            </div>
        </section>
        <!-- page end-->
        </div>
</section>
@endsection