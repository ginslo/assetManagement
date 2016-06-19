@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@section('content')
	@include('common.errors')
	<div class="row">
		<div class="col-sm-12 col-md-6">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/accounts/">{{ $backtitle }}</a>
      <h1>{{ $title }}</h1>
			<form action="/accounts/" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="task-name" class="col-sm-3 control-label">Account Name</label>
						<div class="col-sm-6">
							<input type="text" name="name" id="name" class="form-control" value="">
						</div>
						<label for="task-name" class="col-sm-3 control-label">CRM ID</label>
						<div class="col-sm-6">
							<input type="text" name="crm_id" id="crm_id" class="form-control" value="">
						</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-default">
							<i class="fa fa-btn fa-plus"></i> Add Account
						</button>
					</div>
				</div>
			</form>

		</div>
	</div>
@endsection
