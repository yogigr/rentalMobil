@extends('layouts.admin')
@section('title', 'Edit Why')
@section('breadcrumb')
<li><a href="/admin/why">Why</a></li>
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

				<form method="post" action="{{ url('admin/why/'.$why->id) }}">
					{{ csrf_field() }}
					{{ method_field('patch') }}
					<div class="form-group {{ $errors->has('why_order_number') ? 'has-error' : '' }}">
						<label>Nomor Urut</label>
						<input type="number" name="why_order_number" value="{{ $why->order_number }}" class="form-control" autocomplete="off">
					</div>
					<div class="form-group {{ $errors->has('why_title') ? 'has-error' : '' }}">
						<label>Title/Judul</label>
						<input type="text" name="why_title" value="{{ $why->title }}" class="form-control" autocomplete="off">
					</div>
					<div class="form-group {{ $errors->has('why_description') ? 'has-error' : '' }}">
						<label>Deskripsi</label>
						<textarea rows="6" name="why_description" class="form-control" autocomplete="off">{{ $why->description }}</textarea>
					</div>
					<div class="form-group {{ $errors->has('why_icon') ? 'has-error' : '' }}">
						<label>Icon</label>
						<input type="text" name="why_icon" value="{{ $why->icon }}" class="form-control" autocomplete="off">
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