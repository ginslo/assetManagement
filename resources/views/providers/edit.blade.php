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
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/providers/provider/{{ $provider->id }}">{{ $backtitle }}</a>
			<h1>Editing {{ $provider->name }}</h1>

			<form action="/providers/provider/{{ $provider->id }}/update" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
					<label for="name" class="col-sm-3 control-label">provider</label>
						<div class="col-sm-6">
							<input type="text" name="name" id="name" class="form-control" value="{{ $provider->name }}">
						</div>
					<label for="crm_id" class="col-sm-3 control-label">CRM ID</label>
						<div class="col-sm-6">
							<input type="text" name="crm_id" id="crm_id" class="form-control" value="{{ $provider->crm_id }}">
						</div>
				</div>
				<div class="form-group">
	      	<div class="col-sm-offset-3 col-sm-6">
	        	<button type="submit" class="btn btn-success btn-lg btn-block">
	          	<i class="fa fa-btn fa-plus"></i> Update provider
	          </button>
	        </div>
	      </div>
    	</form>

		</div>
	</div>

@endsection
