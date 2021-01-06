@extends('layout.dashboard')

@section('title', 'Quản lý người dùng')

@section('content')
<section class="wrapper">
	<div class="table-agile-info">
		<div class="panel panel-default">

			<div class="panel-heading">
				Danh sách món ăn
			</div>
			<div>
				<table class="table" ui-jq="footable" ui-options='{
					"paging": {
					"enabled": true
					},
					"filtering": {
					"enabled": true
					},
					"sorting": {
					"enabled": true
					}}'>
					<thead>
						<tr>
							<th>Mã món </th>
							<th>Tên món</th>
							<th>Giá cả</th>
							<th>Đầu bếp làm</th>
							<th>Sửa</th>
							<th>Xóa</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</section>
@endsection
