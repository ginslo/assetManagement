@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@section('content')
	@include('common.errors')
	<div class="row">
		<div class="col-sm-10 col-md-8 col-md-offset-2">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/data_centers/">{{ $backtitle }}</a>
      <h1>{{ $title }}</h1>
			<form action="/data_centers/" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				<div class="form-group">
					<div class="form-group">
						<label for="provider" class="col-sm-3 control-label">Provider</label>
							<div class="col-sm-6">
								{{ Form::select('provider_id', $providers, null, ['class' => 'form-control']) }}
							</div>
					</div>
					<label for="task-name" class="col-sm-3 control-label">Data Center Name</label>
						<div class="col-sm-6">
							<input type="text" name="name" id="name" class="form-control" value="">
						</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-success btn-lg btn-block">
							<i class="fa fa-btn fa-plus"></i> Add Data Center
						</button>
					</div>
				</div>
			</form>

		</div>
	</div>
@endsection
