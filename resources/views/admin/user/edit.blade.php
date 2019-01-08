@extends('layouts.admin')
@section('title', 'Edit Pengguna')
@section('breadcrumb')
<li><a href="/admin/user">Pengguna</a></li>
<li class="active">Edit</li>
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

				<form method="post" action="{{ url('admin/user/'.$user->id) }}">
					{{ csrf_field() }}
					{{ method_field('patch') }}
					<div class="form-group {{ $errors->has('user_name') ? 'has-error' : '' }}">
						<label>Nama Lengkap</label>
						<input type="text" name="user_name" value="{{ $user->name }}" class="form-control" autocomplete="off">
					</div>
					<div class="form-group {{ $errors->has('user_email') ? 'has-error' : '' }}">
						<label>Email</label>
						<input type="text" name="user_email" value="{{ $user->email }}" class="form-control" autocomplete="off">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">
							<i class="fa fa-save"></i> Update
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