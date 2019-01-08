@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="box">
				<div class="box-header">
					<div class="row">
						<div class="col-sm-6">
							Statistik Pengunjung
						</div>
						<div class="col-sm-6 text-right">
							Jumlah Pengunjung: <strong>{{ Visitor::count() }}</strong>,
							Jumlah Click: <strong>{{ Visitor::clicks() }}</strong>
						</div>
					</div>
				</div>
				<div class="box-body table-responsive no-padding">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>IP Address</th>
								<th>Negara</th>
								<th>Jumlah Click</th>
							</tr>
						</thead>
						<tbody>
							@if(Visitor::count() > 0)
							@foreach(Visitor::all() as $visitor)
								<tr>
									<td>{{ $visitor->ip }}</td>
									<td>{{ is_null($visitor->country) ? '-' : $visitor->country }}</td>
									<td>{{ $visitor->clicks }}</td>
								</tr>
							@endforeach
							@else
							<tr><td colspan="3">Belum ada Pengunjung</td></tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection