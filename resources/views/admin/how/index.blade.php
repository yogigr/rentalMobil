@extends('layouts.admin')
@section('title', 'How')
@section('breadcrumb')
<li class="active">How</li>
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
						<a href="{{ url('admin/how/create') }}" class="btn btn-primary btn-flat">
							<i class="fa fa-plus"></i>
							Tambah How
						</a>
					</div>
					<div class="col-sm-6">
						<form id="searchForm" method="get" action="{{ url('admin/how') }}" class="input-group" style="max-width: 300px">
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
							<th style="width: 20px">Nomor Urut</th>
							<th>Icon</th>
							<th>Title</th>
							<th style="max-width: 350px">Deskripsi</th>
							<th>Ditambahkan</th>
							<th>Options</th>
						</tr>
					</thead>
					<tbody>
						@if($hows->count() > 0 )
						@foreach($hows as $how)
						<tr>
							<td>{{ $how->order_number }}</td>
							<td>{!! $how->icon !!}</td>
							<td>{{ $how->title }}</td>
							<td style="max-width: 350px">{{ $how->description }}</td>
							<td>{{ $how->user->name }}</td>
							<td>
								<div class="btn-group">
									<a href="{{ url('admin/how/'.$how->id) }}" class="btn btn-info btn-xs">
										<i class="fa fa-file-text-o"></i>
									</a>
									<a href="{{ url('admin/how/'.$how->id.'/edit') }}" class="btn btn-xs btn-warning">
										<i class="fa fa-edit"></i>
									</a>
									<button class="btn btn-xs btn-danger delete-how-btn"
									url="{{ url('admin/how/'.$how->id) }}">
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
				{{ $hows->links() }}
			</div>
		</div>
	</div>
</div>

<form id="deleteHowForm" method="post" action>
	{{ csrf_field() }}
	{{ method_field('delete') }}
</form>

@endsection


@push('scripts')

<script>
	$(function(){
		$('body').on('click', '.delete-how-btn', function(){

			if (confirm('Apakah yakin hapus?')) {
				var url = $(this).attr('url');
				$('#deleteHowForm').attr('action', url);
				$('#deleteHowForm').submit();
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