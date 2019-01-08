@extends('layouts.admin')
@section('title', 'Tambah Pengguna')
@section('breadcrumb')
<li><a href="/admin/user">Pengguna</a></li>
<li class="active">Tambah</li>
@endsection
@section('content')

<div class="row">
	<div class="col-md-6">
		<div class="box box-solid">
			<div class="box-body">

				@if(count($errors) > 0)
		            <div class="alert alert-danger">
		                <ul>
		                    @foreach ($errors->all() as $error)
		                        <li>{{ $error }}</li>
		                    @endforeach
		                </ul>
		            </div>
		        @endif

				<form method="post" action="{{ url('admin/user') }}">
					{{ csrf_field() }}
					<div class="form-group {{ $errors->has('user_name') ? 'has-error' : '' }}">
						<label>Nama Lengkap</label>
						<input type="text" name="user_name" value="{{ old('user_name') }}" class="form-control" autocomplete="off">
					</div>
					<div class="form-group {{ $errors->has('user_email') ? 'has-error' : '' }}">
						<label>Email</label>
						<input type="text" name="user_email" value="{{ old('user_email') }}" class="form-control" autocomplete="off">
					</div>
					<div class="form-group {{ $errors->has('user_password') ? 'has-error' : '' }}">
						<label>Password</label>
						<input type="password" name="user_password" value="{{ old('user_password') }}" class="form-control" autocomplete="off">
					</div>
					<div class="form-group {{ $errors->has('user_password_confirmation') ? 'has-error' : '' }}">
						<label>Konfirmasi Password</label>
						<input type="password" name="user_password_confirmation" value="{{ old('user_password_confirmation') }}" class="form-control" autocomplete="off">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">
							<i class="fa fa-save"></i> Simpan
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@push('styles')

	<style>
		.box-solid .box-body {
			padding: 20px;
		}
	</style>

@endpush