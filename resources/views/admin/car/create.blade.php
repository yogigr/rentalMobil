@extends('layouts.admin')
@section('title', 'Tambah Paket Mobil')
@section('breadcrumb')
<li><a href="/admin/car">Paket Mobil</a></li>
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

				<form method="post" action="{{ url('admin/car') }}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group {{ $errors->has('car_name') ? 'has-error' : '' }}">
						<label>Merk dan Tipe Mobil</label>
						<input type="text" name="car_name" value="{{ old('car_name') }}" class="form-control" autocomplete="off">
					</div>
					<div class="form-group {{ $errors->has('car_description') ? 'has-error' : '' }}">
						<label>Deskripsi</label>
						<textarea rows="6" name="car_description" class="form-control" autocomplete="off">{{ old('car_description') }}</textarea>
					</div>
					<div class="form-group {{ $errors->has('car_price') ? 'has-error' : '' }}">
						<label>Harga</label>
						<input type="text" name="car_price" value="{{ old('car_price') }}" class="form-control" autocomplete="off">
					</div>
					<div class="form-group {{ $errors->has('car_image') ? 'has-error' : '' }}">
						<label>Upload Photo</label>
						<input type="file" name="car_image" class="form-control">
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