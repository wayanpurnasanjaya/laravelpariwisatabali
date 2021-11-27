@extends('template.admin.default')
@section('title')
<h1><i class="fa fa-dashboard"></i>Administrator</h1>
<p>Halaman Administrator Website Pariwisata Bali</p>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('dashboard') }}

@endsection

@section('content')
@if (auth()->user()->hasRole('administrator'))
<div class="col-md-3">
	<div class="widget-small primary coloured-icon">
		<i class="icon fa fa-users fa-3x"></i>
		<div class="info">
			<h5>Users</h5>
			<p><b>{{$users->count()}}</b></p>
		</div>
	</div>
</div>
<div class="col-md-3">
	<div class="widget-small danger coloured-icon">
		<i class="icon fa fa-database fa-3x"></i>
		<div class="info">
			<h5>Content</h5>
			<p><b>{{$content}}</b></p>
		</div>
	</div>
</div>
<div class="col-md-3">
	<div class="widget-small warning coloured-icon">
		<i class="icon fa fa-upload fa-3x"></i>
		<div class="info">
			<h5>Publish</h5>
			<p><b>{{$publish}}</b></p>
		</div>
	</div>
</div>
<div class="col-md-3">
	<div class="widget-small info coloured-icon">
		<i class="icon fa fa-archive fa-3x"></i>
		<div class="info">
			<h5>NotPublish</h5>
			<p><b>{{$notPublish}}</b></p>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="tile">
		<h3 class="tile-title">Data Content oleh User</h3>
		<div class="table-responsive">
			<table class="table table-hover table-bordered">
				<thead>
					<th>Nomor</th>
					<th>Nama User</th>
					<th>Content</th>
					<th>Publish</th>
					<th>Not Publish</th>
				</thead>
				<tbody>
					@php
					$no=0;
					@endphp
					@foreach ($users as $user)
					@php
					$no++
					@endphp
						<tr>
							<td>{{$no}}</td>
							<td>{{$user->name}}</td>
							<td>{{$getCountContent->getCountContent($user->id)}}</td>
							<td>{{$getCountContentPublish->getCountContentPublish($user->id)}}</td>
							<td>{{$getCountContentNotPublish->getCountContentNotPublish($user->id)}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@else
<div class="col-md-4">
	<div class="widget-small danger coloured-icon">
		<i class="icon fa fa-database fa-3x"></i>
		<div class="info">
			<h5>Content</h5>
			<p><b>{{$userContent}}</b></p>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="widget-small warning coloured-icon">
		<i class="icon fa fa-upload fa-3x"></i>
		<div class="info">
			<h5>Publish</h5>
			<p><b>{{$userContentPublish}}</b></p>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="widget-small info coloured-icon">
		<i class="icon fa fa-archive fa-3x"></i>
		<div class="info">
			<h5>NotPublish</h5>
			<p><b>{{$userContentNotPublish}}</b></p>
		</div>
	</div>
</div>
@endif 
@endsection