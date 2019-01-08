@extends('layouts.admin')
@section('title', 'Lihat Pengguna')
@section('breadcrumb')
<li><a href="/admin/user">Pengguna</a></li>
<li class="active">show</li>
@endsection
@section('content')

@if(session('status'))
<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	{{ session('status') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-error alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	{{ session('error') }}
</div>
@endif

<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header">
				<a href="{{ url('admin/user/'.$user->id.'/edit') }}" class="btn btn-warning btn-flat">
					<i class="fa fa-edit"></i> Edit
				</a>
				<button class="btn btn-danger btn-flat delete-user-btn">
					<i class="fa fa-trash"></i> Hapus 
				</button>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<body>
							<tr>
								<th>Nama Lengkap</th>
								<td>{{ $user->name }}</td>
							</tr>
							<tr>
								<th>Email</th>
								<td>{{ $user->email }}</td>
							</tr>
							<tr>
								<th>TGL Dibuat</th>
								<td>{{ $user->created_at }}</td>
							</tr>
							<tr>
								<th>TGL Diupdate</th>
								<td>{{ $user->updated_at }}</td>
							</tr>
						</body>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<form id="deleteUserForm" method="post" action>
	{{ csrf_field() }}
	{{ method_field('delete') }}
</form>

@endsection

@push('scripts')

<script>
	$(function(){
		$('body').on('click', '.delete-user-btn', function(){

			if (confirm('Apakah yakin hapus?')) {
				var url = $(this).attr('url');
				$('#deleteUserForm').attr('action', url);
				$('#deleteUserForm').submit();
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