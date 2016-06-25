@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')
@include('common.errors')
	<div class="row">
		<div class="col-sm-10 col-md-8 col-md-offset-2">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/domain_names/domain_name/{{ $domain_name->id }}">{{ $backtitle }}</a>
			<h1>Editing {{ $domain_name->name }}</h1>

			<form action="/domain_names/domain_name/{{ $domain_name->id }}/update" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
					<label for="name" class="col-sm-3 control-label">Domain Name</label>
						<div class="col-sm-6">
							<input type="text" name="name" id="name" class="form-control" value="{{ $domain_name->name }}">
						</div>
				</div>
				<div class="form-group">
					<label for="registrar" class="col-sm-3 control-label">Registrar</label>
						<div class="col-sm-6">
							{{ Form::select('registrar_id', $registrars, $domain_name->registrar_id, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<label for="user" class="col-sm-3 control-label">User</label>
						<div class="col-sm-6">
							{{ Form::select('user_id', $users, $domain_name->user_id, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<label for="crm_id" class="col-sm-3 control-label">Creation Date</label>
						<div class="col-sm-6">
							<input type="text" name="creation_date" id="creation_date" class="form-control" value="{{ $domain_name->creation_date }}">
						</div>
				</div>
				<div class="form-group">
					<label for="crm_id" class="col-sm-3 control-label">Expiration Date</label>
						<div class="col-sm-6">
							<input type="text" name="expiration_date" id="expiration_date" class="form-control" value="{{ $domain_name->expiration_date }}">
						</div>
				</div>
				<div class="form-group">
					<label for="cost" class="col-sm-3 control-label">Cost</label>
						<div class="col-sm-6">
							<input type="text" name="cost" id="name" class="form-control" value="{{ $domain_name->cost }}">
						</div>
				</div>
				<div class="form-group">
					<label for="price" class="col-sm-3 control-label">Price</label>
						<div class="col-sm-6">
							<input type="text" name="price" id="name" class="form-control" value="{{ $domain_name->price }}">
						</div>
				</div>
				<div class="form-group">
	      	<div class="col-sm-offset-3 col-sm-6">
	        	<button type="submit" class="btn btn-success btn-lg btn-block">
	          	<i class="fa fa-btn fa-plus"></i> Update domain_name
	          </button>
	        </div>
	      </div>
    	</form>

		</div>
	</div>

@endsection
