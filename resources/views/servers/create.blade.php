@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@section('content')
	@include('common.errors')

	<div class="row">
		<div class="col-sm-10 col-md-8 col-md-offset-2">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/servers/">{{ $backtitle }}</a>
			<h1>Create Server</h1>
			<form action="/servers/" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="first_name" class="col-sm-3 control-label">Name</label>
						<div class="col-sm-6">
							<input type="text" name="name" id="name" class="form-control" value="">
						</div>
				</div>
				<div class="form-group">
					<label for="provider" class="col-sm-3 control-label">Provider</label>
						<div class="col-sm-6">
							{{ Form::select('provider_id', $providers, null, ['class' => 'form-control']) }}
						</div>
				</div>

				<div class="form-group">
					<label for="data_center" class="col-sm-3 control-label">Data Center</label>
						<div class="col-sm-6">
							{{ Form::select('data_center_id', $data_centers, null, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<label for="state" class="col-sm-3 control-label">state</label>
						<div class="col-sm-6">
							<input type="text" name="state" id="state" class="form-control" value="">
						</div>
				</div>
				<div class="form-group">
					<label for="hostname" class="col-sm-3 control-label">hostname</label>
						<div class="col-sm-6">
							<input type="text" name="hostname" id="hostname" class="form-control" value="">
						</div>
				</div>
				<div class="form-group">
					<label for="instance_id" class="col-sm-3 control-label">instance_id</label>
						<div class="col-sm-6">
							<input type="text" name="instance_id" id="instance_id" class="form-control" value="">
						</div>
				</div>

				<div class="form-group">
					<label for="purpose" class="col-sm-3 control-label">Purpose</label>
						<div class="col-sm-6">
							{{ Form::select('purpose_id', $purposes, null, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<label for="ip_public" class="col-sm-3 control-label">ip_public</label>
						<div class="col-sm-6">
							<input type="text" name="ip_public" id="ip_public" class="form-control" value="">
						</div>
				</div>
				<div class="form-group">
					<label for="ip_private" class="col-sm-3 control-label">ip_private</label>
						<div class="col-sm-6">
							<input type="text" name="ip_private" id="ip_private" class="form-control" value="">
						</div>
				</div>
				<div class="form-group">
					<label for="distribution" class="col-sm-3 control-label">OS</label>
						<div class="col-sm-6">
							{{ Form::select('distribution_id', $distributions, null, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<label for="distribution_version" class="col-sm-3 control-label">Distro Version</label>
						<div class="col-sm-6">
							{{ Form::select('distribution_version_id', $distribution_versions, null, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<label for="kernel" class="col-sm-3 control-label">kernel</label>
						<div class="col-sm-6">
							<input type="text" name="kernel" id="kernel" class="form-control" value="">
						</div>
				</div>
				<div class="form-group">
					<label for="repo_update" class="col-sm-3 control-label">repo_update</label>
						<div class="col-sm-6">
							<input type="text" name="repo_update" id="repo_update" class="form-control" value="">
						</div>
				</div>
				<div class="form-group">
					<label for="size" class="col-sm-3 control-label">Cores</label>
						<div class="col-sm-6">
							<input type="text" name="cores" id="size" class="form-control" value="">
						</div>
				</div>
				<div class="form-group">
					<label for="size" class="col-sm-3 control-label">Disk Size (GB)</label>
						<div class="col-sm-6">
							<input type="text" name="size" id="size" class="form-control" value="">
						</div>
				</div>
				<div class="form-group">
					<label for="memory" class="col-sm-3 control-label">Memory</label>
						<div class="col-sm-6">
							<input type="text" name="memory" id="memory" class="form-control" value="">
						</div>
				</div>
				<div class="form-group">
					<label for="user" class="col-sm-3 control-label">User</label>
						<div class="col-sm-6">
							{{ Form::select('user_id', $users, null, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<label for="price" class="col-sm-3 control-label">price</label>
					<div class="col-sm-6">
						<input type="text" name="price" id="price" class="form-control" value="">
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
