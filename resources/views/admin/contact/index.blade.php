@extends('layouts.admin')
@section('title', 'Kontak')
@section('breadcrumb')
<li class="active">Kontak</li>
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

				<form method="post" action="{{ url('admin/contact') }}">
					{{ csrf_field() }}
					{{ method_field('patch') }}
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group {{ $errors->has('nama_perusahaan') ? 'has-error' : '' }}">
								<label>Nama Perusahaan</label>
								<input type="text" name="nama_perusahaan" value="{{ $contact->nama_perusahaan }}"
								class="form-control" autocomplete="off">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
								<label>Email</label>
								<input type="text" name="email" value="{{ $contact->email }}"
								class="form-control" autocomplete="off">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group {{ $errors->has('deskripsi_pendek') ? 'has-error' : '' }}">
								<label>Deskripsi Pendek</label>
								<input type="text" name="deskripsi_pendek" value="{{ $contact->deskripsi_pendek }}"
								class="form-control" autocomplete="off">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group {{ $errors->has('deskripsi') ? 'has-error' : '' }}">
								<label>Deskripsi Perusahaan</label>
								<textarea name="deskripsi" 
								class="form-control" rows="6">{{ $contact->deskripsi }}</textarea>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
								<label>Alamat</label>
								<textarea name="alamat" 
								class="form-control" rows="6">{{ $contact->alamat }}</textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group {{ $errors->has('hari_kerja') ? 'has-error' : '' }}">
								<label>Hari Kerja</label>
								<input type="text" name="hari_kerja" value="{{ $contact->hari_kerja }}"
								class="form-control" autocomplete="off">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group {{ $errors->has('jam_kerja') ? 'has-error' : '' }}">
								<label>Jam Kerja</label>
								<input type="text" name="jam_kerja" value="{{ $contact->jam_kerja }}"
								class="form-control" autocomplete="off">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group {{ $errors->has('telp1') ? 'has-error' : '' }}">
								<label>Telp 1</label>
								<input type="text" name="telp1" value="{{ $contact->telp1 }}"
								class="form-control" autocomplete="off">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group {{ $errors->has('telp2') ? 'has-error' : '' }}">
								<label>Telp 2</label>
								<input type="text" name="telp2" value="{{ $contact->telp2 }}"
								class="form-control" autocomplete="off">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group {{ $errors->has('telp3') ? 'has-error' : '' }}">
								<label>Telp 3</label>
								<input type="text" name="telp3" value="{{ $contact->telp3 }}"
								class="form-control" autocomplete="off">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
								<label>Facebook</label>
								<input type="text" name="facebook" value="{{ $contact->facebook }}"
								class="form-control" autocomplete="off">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group {{ $errors->has('instagram') ? 'has-error' : '' }}">
								<label>Instagram</label>
								<input type="text" name="instagram" value="{{ $contact->instagram }}"
								class="form-control" autocomplete="off">
							</div>
						</div>
					</div>
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