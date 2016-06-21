@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@section('content')
	@include('common.errors')
	<div class="row">
		<div class="row">
			<div class="col-sm-10 col-md-8 col-md-offset-2">
				<i class="fa fa-backward" aria-hidden="true"></i> <a href="/users/">{{ $backtitle }}</a>
				<h1>Create New User</h1>
				<form action="/users/" method="POST" class="form-horizontal">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="first_name" class="col-sm-3 control-label">First Name</label>
							<div class="col-sm-6">
								<input type="text" name="first_name" id="first_name" class="form-control" value="">
							</div>
					</div>
					<div class="form-group">
						<label for="last_name" class="col-sm-3 control-label">Last Name</label>
							<div class="col-sm-6">
								<input type="text" name="last_name" id="last_name" class="form-control" value="">
							</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-3 control-label">Email</label>
							<div class="col-sm-6">
								<input type="text" name="email" id="email" class="form-control" value="">
							</div>
					</div>
					<div class="form-group">
						<label for="last_name" class="col-sm-3 control-label">Account</label>
							<div class="col-sm-6">
								{{ Form::select('account_id', $accounts, null, ['class' => 'form-control']) }}
							</div>
					</div>
					<div class="form-group">
						<label for="crm_id" class="col-sm-3 control-label">CRM ID</label>
							<div class="col-sm-6">
								<input type="text" name="crm_id" id="crm_id" class="form-control" value="">
							</div>
					</div>
					<div class="form-group">
		      	<div class="col-sm-offset-3 col-sm-6">
		        	<button type="submit" class="btn btn-success btn-lg btn-block">
		          	<i class="fa fa-btn fa-plus"></i> Create user
		          </button>
		        </div>
		      </div>
	    	</form>
			</div>
		</div>
	</div>
@endsection
