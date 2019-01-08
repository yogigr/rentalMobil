@extends('layouts.admin')
@section('title', 'Lihat Paket Mobil')
@section('breadcrumb')
<li><a href="/admin/car">Paket Mobil</a></li>
<li class="active">show</li>
@endsection
@section('content')

@if(session('status'))
<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	{{ session('status') }}
</div>
@endif

<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header">
				<a href="{{ url('admin/car/'.$car->id.'/edit') }}" class="btn btn-warning btn-flat">
					<i class="fa fa-edit"></i> Edit
				</a>
				<button class="btn btn-danger btn-flat delete-car-btn">
					<i class="fa fa-trash"></i> Hapus 
				</button>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-sm-6">
						<img src="{{ $car->getImage() }}" class="img-responsive">
					</div>
					<div class="col-sm-6">
						<div class="table-responsive">
							<table class="table table-bordered">
								<body>
									<tr>
										<th>Merk/Tipe Mobil</th>
										<td>{{ $car->name }}</td>
									</tr>
									<tr>
										<th>Harga</th>
										<td>{{ $car->getPrice() }}</td>
									</tr>
									<tr>
										<th>Status</th>
										<td>{!! $car->status() !!}</td>
									</tr>
									<tr>
										<th>Ditambahkan</th>
										<td>{{ $car->user->name }}</td>
									</tr>
									<tr>
										<th>TGL Dibuat</th>
										<td>{{ $car->created_at }}</td>
									</tr>
									<tr>
										<th>TGL Diupdate</th>
										<td>{{ $car->updated_at }}</td>
									</tr>
									<tr>
										<td colspan="2">
											<h4>Deskripsi</h4>
											{{ $car->description }}
										</td>
									</tr>
								</body>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<form id="deleteCarForm" method="post" action>
	{{ csrf_field() }}
	{{ method_field('delete') }}
</form>

@endsection

@push('scripts')

<script>
	$(function(){
		$('body').on('click', '.delete-car-btn', function(){

			if (confirm('Apakah yakin hapus?')) {
				var url = $(this).attr('url');
				$('#deleteCarForm').attr('action', url);
				$('#deleteCarForm').submit();
			}

			return false;
		});
	});
</script>

@endpush

@push('styles')

	<style>
		.box-solid .box-body {
			padding: 20px;
		}
	</style>

@endpush