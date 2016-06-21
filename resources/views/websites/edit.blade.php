@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')

	<div class="row">
		<div class="col-sm-10 col-md-8 col-md-offset-2">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/websites/website/{{ $website->id }}">{{ $backtitle }}</a>
			<h1>Editing {{ $website->name }}</h1>
			<form action="/websites/website/{{ $website->id }}/update" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
					<label for="first_name" class="col-sm-3 control-label">Name</label>
						<div class="col-sm-6">
							<input type="text" name="name" id="name" class="form-control" value="{{ $website->name }}">
						</div>
				</div>
				<div class="form-group">
					<label for="subdomain" class="col-sm-3 control-label">Subdomain</label>
						<div class="col-sm-6">
							<input type="text" name="subdomain" id="subdomain" class="form-control" value="{{ $website->subdomain }}">
						</div>
				</div>
				<div class="form-group">
					<label for="last_name" class="col-sm-3 control-label">Domain Name</label>
						<div class="col-sm-6">
							{{ Form::select('domain_name_id', $domain_names, $website->domain_name_id, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<label for="user" class="col-sm-3 control-label">User</label>
						<div class="col-sm-6">
							{{ Form::select('user_id', $users, $website->user_id, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<label for="server" class="col-sm-3 control-label">Server</label>
						<div class="col-sm-6">
							{{ Form::select('server_id', $servers, $website->server_id, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<label for="application" class="col-sm-3 control-label">Application Name</label>
						<div class="col-sm-6">
							{{ Form::select('application_id', $applications, $website->application_id, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<label for="ci_name" class="col-sm-3 control-label">{{ env('CI_NAME') }} Name (url)</label>
						<div class="col-sm-6">
							<input type="text" name="ci_name" id="ci_name" class="form-control" value="{{ $website->ci_name }}">
						</div>
				</div>
				<div class="form-group">
					<label for="bugtracker_name" class="col-sm-3 control-label">{{ env('BUGTRACKER_NAME') }} Name (url)</label>
						<div class="col-sm-6">
							<input type="text" name="bugtracker_name" id="bugtracker_name" class="form-control" value="{{ $website->bugtracker_name }}">
						</div>
				</div>
				<div class="form-group">
	      	<div class="col-sm-offset-3 col-sm-6">
	        	<button type="submit" class="btn btn-success btn-lg btn-block">
	          	<i class="fa fa-btn fa-plus"></i> Update Website
	          </button>
	        </div>
	      </div>
    	</form>
		</div>
	</div>
@endsection
