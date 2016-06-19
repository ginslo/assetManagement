@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@section('content')
	@include('common.errors')
	<div class="row">
		<div class="col-sm-12 col-md-6">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/os_versions/">{{ $backtitle }}</a>
      <h1>{{ $title }}</h1>
			<form action="/os_versions/" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name" class="col-sm-3 control-label">Operating System Version Name</label>
						<div class="col-sm-6">
							<input type="text" name="name" id="name" class="form-control" value="">
						</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-primary">
							<i class="fa fa-btn fa-plus"></i> Add Operating System Version
						</button>
					</div>
				</div>
			</form>

		</div>
	</div>
@endsection