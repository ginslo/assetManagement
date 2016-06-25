@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@section('content')
	@include('common.errors')
	<div class="row">
		<div class="col-sm-10 col-md-8 col-md-offset-2">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/distributions/">{{ $backtitle }}</a>
      <h1>{{ $title }}</h1>
			<form action="/distributions/" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="task-name" class="col-sm-3 control-label">Distribution Name</label>
						<div class="col-sm-6">
							<input type="text" name="name" id="name" class="form-control" value="">
						</div>
				</div>
				<div class="form-group">
					<label for="source_url" class="col-sm-3 control-label">Source URL</label>
						<div class="col-sm-6">
							<input type="text" name="source_url" id="source_url" class="form-control" value="">
						</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-success btn-lg btn-block">
							<i class="fa fa-btn fa-plus"></i> Add Distribution
						</button>
					</div>
				</div>
			</form>

		</div>
	</div>
@endsection
