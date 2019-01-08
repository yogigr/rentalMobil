@extends('layouts.admin')
@section('title', 'Lihat Why')
@section('breadcrumb')
<li><a href="/admin/why">Why</a></li>
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
				<a href="{{ url('admin/why/'.$why->id.'/edit') }}" class="btn btn-warning btn-flat">
					<i class="fa fa-edit"></i> Edit
				</a>
				<button class="btn btn-danger btn-flat delete-why-btn">
					<i class="fa fa-trash"></i> Hapus 
				</button>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<body>
							<tr>
								<th>Nomor Urut</th>
								<td>{{ $why->order_number }}</td>
							</tr>
							<tr>
								<th>Icon</th>
								<td>{!! $why->icon !!}</td>
							</tr>
							<tr>
								<th>Title/Judul</th>
								<td>{{ $why->title }}</td>
							</tr>
							<tr>
								<th>Ditambahkan</th>
								<td>{{ $why->user->name }}</td>
							</tr>
							<tr>
								<th>TGL Dibuat</th>
								<td>{{ $why->created_at }}</td>
							</tr>
							<tr>
								<th>TGL Diupdate</th>
								<td>{{ $why->updated_at }}</td>
							</tr>
							<tr>
								<td colspan="2">
									<h4>Deskripsi</h4>
									{{ $why->description }}
								</td>
							</tr>
						</body>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<form id="deleteWhyForm" method="post" action>
	{{ csrf_field() }}
	{{ method_field('delete') }}
</form>

@endsection

@push('scripts')

<script>
	$(function(){
		$('body').on('click', '.delete-why-btn', function(){

			if (confirm('Apakah yakin hapus?')) {
				var url = $(this).attr('url');
				$('#deleteWhyForm').attr('action', url);
				$('#deleteWhyForm').submit();
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