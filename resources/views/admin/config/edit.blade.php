@extends('layouts.admin')
@section('title', 'Pengaturan')
@section('breadcrumb')
<li class="active">Pengaturan</li>
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

				<form method="post" action="{{ url('admin/config') }}">
					{{ csrf_field() }}
					{{ method_field('patch') }}
					<div class="row">
						<div class="col-sm-12">
							<h4>Pengaturan Aplikasi</h4>
							<hr>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>App Name</label>
								<input type="text" name="app_name" value="{{ config('app.name') }}" class="form-control"
								autocomplete="off">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Environtment</label>
								<select class="form-control" name="app_env">
									<option value="local" {{ config('app.env') == 'local' ? 'selected' : '' }}>Local</option>
									<option value="production" {{ config('app.env') == 'production' ? 'selected' : '' }}>Production</option>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Debug</label>
								<select class="form-control" name="app_debug">
									<option value="0" {{ config('app.debug') == false ? 'selected' : '' }}>False</option>
									<option value="1" {{ config('app.debug') == true ? 'selected' : '' }}>True</option>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>App URL</label>
								<input type="text" name="app_url" value="{{ config('app.url') }}" class="form-control"
								autocomplete="off">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Timezone</label>
								<input type="text" name="app_timezone" value="{{ config('app.timezone') }}" class="form-control"
								autocomplete="off">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Localization</label>
								<select class="form-control" name="app_locale">
									<option value="id" {{ config('app.locale') == 'id' ? 'selected' : '' }}>Indonesia</option>
									<option value="en" {{ config('app.locale') == 'en' ? 'selected' : '' }}>English</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<h4>Pengaturan Email</h4>
							<hr>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Driver</label>
								<input type="text" name="mail_driver" value="{{ config('mail.driver') }}" class="form-control"
								autocomplete="off">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Host</label>
								<input type="text" name="mail_host" value="{{ config('mail.host') }}" class="form-control"
								autocomplete="off">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Port</label>
								<input type="text" name="mail_port" value="{{ config('mail.port') }}" class="form-control"
								autocomplete="off">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="mail_username" value="{{ config('mail.username') }}" class="form-control"
								autocomplete="off">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Password</label>
								<input type="text" name="mail_password" value="{{ config('mail.password') }}" class="form-control"
								autocomplete="off">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>From Address</label>
								<input type="text" name="mail_from_address" value="{{ config('mail.from.address') }}" class="form-control"
								autocomplete="off">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>From Name</label>
								<input type="text" name="mail_from_name" value="{{ config('mail.from.name') }}" class="form-control"
								autocomplete="off">
							</div>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-flat">
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