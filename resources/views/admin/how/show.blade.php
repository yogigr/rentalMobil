@extends('layouts.admin')
@section('title', 'Lihat How')
@section('breadcrumb')
<li><a href="/admin/how">How</a></li>
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
				<a href="{{ url('admin/how/'.$how->id.'/edit') }}" class="btn btn-warning btn-flat">
					<i class="fa fa-edit"></i> Edit
				</a>
				<button class="btn btn-danger btn-flat delete-how-btn">
					<i class="fa fa-trash"></i> Hapus 
				</button>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<body>
							<tr>
								<th>Nomor Urut</th>
								<td>{{ $how->order_number }}</td>
							</tr>
							<tr>
								<th>Icon</th>
								<td>{!! $how->icon !!}</td>
							</tr>
							<tr>
								<th>Title/Judul</th>
								<td>{{ $how->title }}</td>
							</tr>
							<tr>
								<th>Ditambahkan</th>
								<td>{{ $how->user->name }}</td>
							</tr>
							<tr>
								<th>TGL Dibuat</th>
								<td>{{ $how->created_at }}</td>
							</tr>
							<tr>
								<th>TGL Diupdate</th>
								<td>{{ $how->updated_at }}</td>
							</tr>
							<tr>
								<td colspan="2">
									<h4>Deskripsi</h4>
									{{ $how->description }}
								</td>
							</tr>
						</body>
					</table>
				</div>
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
		.box-solid .box-body {
			padding: 20px;
		}
	</style>

@endpush