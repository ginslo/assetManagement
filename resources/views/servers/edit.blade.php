@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')
@endsection
@section('content')
@include('common.errors')
	<div class="row">
		<div class="col-sm-10 col-md-8 col-md-offset-2">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/servers/server/{{ $server->id }}">{{ $backtitle }}</a>
			<h1>Editing {{ $server->name }}</h1>
			<form action="/servers/server/{{ $server->id }}/update" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
					<label for="first_name" class="col-sm-3 control-label">Name</label>
						<div class="col-sm-6">
							<input type="text" name="name" id="name" class="form-control" value="{{ $server->name }}">
						</div>
				</div>
				<div class="form-group">
					<label for="provider" class="col-sm-3 control-label">Provider</label>
						<div class="col-sm-6">
							{{ Form::select('provider_id', $providers, $server->provider_id, ['class' => 'form-control']) }}
						</div>
				</div>

				<div class="form-group">
					<label for="data_center" class="col-sm-3 control-label">Data Center</label>
						<div class="col-sm-6">
							{{ Form::select('data_center_id', $data_centers, $server->data_center_id, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<label for="state" class="col-sm-3 control-label">state</label>
						<div class="col-sm-6">
							<select name="state" class="form-control">
									<option value="0"{!! $server->state == 0 ? " selected=\"selected\"" : "" !!}>Stopped</option>
									<option value="1"{!! $server->state == 1 ? " selected=\"selected\"" : "" !!}>Running</option>
							</select>
						</div>
				</div>
				<div class="form-group">
					<label for="hostname" class="col-sm-3 control-label">hostname</label>
						<div class="col-sm-6">
							<input type="text" name="hostname" id="hostname" class="form-control" value="{{ $server->hostname }}">
						</div>
				</div>
				<div class="form-group">
					<label for="instance_id" class="col-sm-3 control-label">instance_id</label>
						<div class="col-sm-6">
							<input type="text" name="instance_id" id="instance_id" class="form-control" value="{{ $server->instance_id }}">
						</div>
				</div>

				<div class="form-group">
					<label for="purpose" class="col-sm-3 control-label">Purpose</label>
						<div class="col-sm-6">
							{{ Form::select('purpose_id', $purposes, $server->purpose_id, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<label for="ip_public" class="col-sm-3 control-label">ip_public</label>
						<div class="col-sm-6">
							<input type="text" name="ip_public" id="ip_public" class="form-control" value="{{ $server->ip_public }}">
						</div>
				</div>
				<div class="form-group">
					<label for="ip_private" class="col-sm-3 control-label">ip_private</label>
						<div class="col-sm-6">
							<input type="text" name="ip_private" id="ip_private" class="form-control" value="{{ $server->ip_private }}">
						</div>
				</div>
				<div class="form-group">
					<label for="distribution" class="col-sm-3 control-label">OS</label>
						<div class="col-sm-6">
							{{ Form::select('distribution_id', $distributions, $server->distribution_id, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<label for="version" class="col-sm-3 control-label">Distro Version</label>
						<div class="col-sm-6">
							{{ Form::select('version_id', $versions, $server->version_id, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<label for="kernel" class="col-sm-3 control-label">kernel</label>
						<div class="col-sm-6">
							<input type="text" name="kernel" id="kernel" class="form-control" value="{{ $server->kernel }}">
						</div>
				</div>
				<div class="form-group">
					<label for="repo_update" class="col-sm-3 control-label">repo_update</label>
						<div class="col-sm-6">
							<input type="text" name="repo_update" id="repo_update" class="form-control" value="{{ $server->repo_update }}">
						</div>
				</div>
				<div class="form-group">
					<label for="size" class="col-sm-3 control-label">Cores</label>
						<div class="col-sm-6">
							<input type="text" name="cores" id="cores" class="form-control" value="{{ $server->cores }}">
						</div>
				</div>
				<div class="form-group">
					<label for="size" class="col-sm-3 control-label">Disk Size (GB)</label>
						<div class="col-sm-6">
							<input type="text" name="size" id="size" class="form-control" value="{{ $server->size }}">
						</div>
				</div>
				<div class="form-group">
					<label for="memory" class="col-sm-3 control-label">Memory</label>
						<div class="col-sm-6">
							<input type="text" name="memory" id="memory" class="form-control" value="{{ $server->memory }}">
						</div>
				</div>
				<div class="form-group">
					<label for="user" class="col-sm-3 control-label">User</label>
						<div class="col-sm-6">
							{{ Form::select('user_id', $users, $server->user_id, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<label for="cost" class="col-sm-3 control-label">Cost</label>
					<div class="col-sm-6">
						<input type="text" name="cost" id="cost" class="form-control" value="{{ $server->cost }}">
					</div>
				</div>
				<div class="form-group">
					<label for="price" class="col-sm-3 control-label">Price</label>
					<div class="col-sm-6">
						<input type="text" name="price" id="price" class="form-control" value="{{ $server->price }}">
					</div>
				</div>
				<div class="form-group">
				<label for="recurring" class="col-sm-3 control-label">Recurring?</label>
					<div class="col-sm-6">
						<select name="state" class="form-control">
								<option value="0"{!! $server->recurring == 0 ? " selected=\"selected\"" : "" !!}>No</option>
								<option value="1"{!! $server->recurring == 1 ? " selected=\"selected\"" : "" !!}>Yes</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="period" class="col-sm-3 control-label">Recurring Period</label>
						<div class="col-sm-6">
							{{ Form::select('period_id', $periods, $server->period_id, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<label for="bugtracker_name" class="col-sm-3 control-label">Bugtracker</label>
					<div class="col-sm-6">
						<input type="text" name="bugtracker_name" id="bugtracker_name" class="form-control" value="{{ $server->bugtracker_name }}">
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
