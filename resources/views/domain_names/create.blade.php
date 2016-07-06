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
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/domain_names/">{{ $backtitle }}</a>
      <h1>{{ $title }}</h1>
			<form action="/domain_names/" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="task-name" class="col-sm-3 control-label">Domain Name</label>
						<div class="col-sm-6">
							<input type="text" name="name" id="name" class="form-control" value="">
						</div>
				</div>
				<div class="form-group">
					<label for="registrar" class="col-sm-3 control-label">Registrar</label>
						<div class="col-sm-6">
							{{ Form::select('registrar_id', $registrars, null, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<label for="user" class="col-sm-3 control-label">User</label>
						<div class="col-sm-6">
							{{ Form::select('user_id', $users, null, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<label for="crm_id" class="col-sm-3 control-label">Creation Date</label>
						<div class="col-sm-6">
							<input type="text" name="creation_date" id="creation_date" class="form-control" value="">
						</div>
				</div>
				<div class="form-group">
					<label for="crm_id" class="col-sm-3 control-label">Expiration Date</label>
						<div class="col-sm-6">
							<input type="text" name="expiration_date" id="expiration_date" class="form-control" value="">
						</div>
				</div>
				<div class="form-group">
				<label for="cost" class="col-sm-3 control-label">Cost</label>
					<div class="col-sm-6">
						<input type="text" name="cost" id="cost" class="form-control" value="">
					</div>
			</div>
			<div class="form-group">
				<label for="price" class="col-sm-3 control-label">Price</label>
					<div class="col-sm-6">
						<input type="text" name="price" id="price" class="form-control" value="">
					</div>
			</div>
			<div class="form-group">
				<label for="auto_renew" class="col-sm-3 control-label">Auto-Renew</label>
					<div class="col-sm-6">
						<select name="auto_renew" class="form-control">
								<option value="0">Off</option>
								<option value="1" Selected>Auto</option>
						</select>
					</div>
			</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-success btn-lg btn-block">
							<i class="fa fa-btn fa-plus"></i> Add Domain Name
						</button>
					</div>
				</div>
			</form>

		</div>
	</div>
@endsection
