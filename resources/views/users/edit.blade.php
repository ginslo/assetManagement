@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')
@include('common.errors')
	<div class="row">
		<div class="col-sm-10 col-md-8 col-md-offset-2">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/users/user/{{ $user->id }}">{{ $backtitle }}</a>
			<h1>Editing {{ $user->first_name }} {{ $user->last_name }}</h1>
			<form action="/users/user/{{ $user->id }}/update" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
					<label for="first_name" class="col-sm-3 control-label">First Name</label>
						<div class="col-sm-6">
							<input type="text" name="first_name" id="first_name" class="form-control" value="{{ $user->first_name }}">
						</div>
				</div>
				<div class="form-group">
					<label for="last_name" class="col-sm-3 control-label">Last Name</label>
						<div class="col-sm-6">
							<input type="text" name="last_name" id="last_name" class="form-control" value="{{ $user->last_name }}">
						</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Email</label>
						<div class="col-sm-6">
							<input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
						</div>
				</div>
				<div class="form-group">
					<label for="last_name" class="col-sm-3 control-label">Account</label>
						<div class="col-sm-6">
							{{ Form::select('account_id', $accounts, $user->account_id, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<label for="crm_id" class="col-sm-3 control-label">CRM ID</label>
						<div class="col-sm-6">
							<input type="text" name="crm_id" id="crm_id" class="form-control" value="{{ $user->crm_id }}">
						</div>
				</div>
				<div class="form-group">
	      	<div class="col-sm-offset-3 col-sm-6">
	        	<button type="submit" class="btn btn-success btn-lg btn-block">
	          	<i class="fa fa-btn fa-plus"></i> Update user
	          </button>
	        </div>
	      </div>
    	</form>
		</div>
	</div>

@endsection
