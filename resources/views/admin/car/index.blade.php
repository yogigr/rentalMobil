@extends('layouts.admin')
@section('title', 'Paket Mobil')
@section('breadcrumb')
<li class="active">Paket Mobil</li>
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
			<div class="box-header bg-gray">
				<div class="row">
					<div class="col-sm-6">
						<a href="{{ url('admin/car/create') }}" class="btn btn-primary btn-flat">
							<i class="fa fa-plus"></i>
							Tambah Mobil
						</a>
					</div>
					<div class="col-sm-6">
						<form id="searchForm" method="get" action="{{ url('admin/car') }}" class="input-group" style="max-width: 300px">
							<div class="input-group-addon bg-light-blue"><i class="fa fa-search"></i></div>
							<input type="text" name="query" class="form-control" value="{{ request('query') }}" 
							placeholder="Cari" autocomplete="off">
						</form>
					</div>
				</div>
			</div>
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover table-bordered table-striped">
					<thead class="bg-gray">
						<tr>
							<th style="max-width: 50px">Photo</th>
							<th>Merk / Tipe Mobil</th>
							<th class="text-right">Harga</th>
							<th class="text-center">Status</th>
							<th>Ditambahkan</th>
							<th>Options</th>
						</tr>
					</thead>
					<tbody>
						@if($cars->count() > 0 )
						@foreach($cars as $car)
						<tr>
							<td style="max-width: 50px"><img src="{{ $car->getImage() }}" class="o-img"></td>
							<td>{{ $car->name }}</td>
							<td class="text-right">{{ $car->getPrice() }}</td>
							<td class="text-center">{!! $car->status() !!}</td>
							<td>{{ $car->user->name }}</td>
							<td>
								<div class="btn-group">
									<a href="{{ url('admin/car/'.$car->id) }}" class="btn btn-info btn-xs">
										<i class="fa fa-file-text-o"></i>
									</a>
									<a href="{{ url('admin/car/'.$car->id.'/edit') }}" class="btn btn-xs btn-warning">
										<i class="fa fa-edit"></i>
									</a>
									<button class="btn btn-xs btn-danger delete-car-btn"
									url="{{ url('admin/car/'.$car->id) }}">
										<i class="fa fa-trash"></i>
									</button>
								</div>
							</td>
						</tr>
						@endforeach
						@else
						<tr><td colspan="5">{{ request('query') ? 'tidak ditemukan' : 'data belum ada' }}</td></tr>
						@endif
					</tbody>
				</table>
			</div>
			<div class="box-footer bg-gray text-right">
				{{ $cars->links() }}
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
	.pagination {
		margin: 0;
	}

	.o-img {
		max-width: 50px;
	}

	@media (max-width: 500px) {
		#searchForm {
	    	float: left !important;
	  	}
	}

	@media (min-width: 501px) {
	 	#searchForm {
	    	float: right !important;
	  	}
	}
</style>
@endpush