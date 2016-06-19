@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')

  <div class="row">
    <div class="col-sm-12 col-md-6">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/domain_names/domain_name/{{ $domain_name->id }}">{{ $backtitle }}</a>
      <h1>Editing {{ $domain_name->name }}</h1>
        {{-- <p class="leftcol">Name: <span class="propbox pull-right">{{ $domain_name->name }}</span></p> --}}
    </div>
  </div>

	<div class="row">
		<div class="col-sm-12 col-md-6">

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
	        	<button type="submit" class="btn btn-default">
	          	<i class="fa fa-btn fa-plus"></i> Update domain_name
	          </button>
	        </div>
	      </div>
    	</form>

		</div>
	</div>

@endsection
