@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@section('content')
	@include('common.errors')
	{{-- <div class="row">
		<div class="col-sm-8 col-md-offset-2">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/accounts/">{{ $backtitle }}</a>
      <h1>{{ $title }}</h1>
			<form action="/accounts/" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name" class="col-sm-3 control-label">Account Name</label>
						<div class="col-sm-6">
							<input type="text" name="name" id="name" class="form-control" value="">
						</div>
						<label for="crm_id" class="col-sm-3 control-label">CRM ID</label>
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
	</div> --}}


	<div class="row">
		<div class="col-sm-8 col-md-offset-2">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/accounts/">{{ $backtitle }}</a>
			<h1>{{ $title }}</h1>
			{!! Form::open(array('route' => 'accounts..store')) !!}
				<div class="form-group">
					{{ Form::label('name', 'Account Name: ')}}
					<div class="col-sm-6">
						{{ Form::text('name', null, array('class' => 'form-control')) }}
					</div>
						{{ Form::label('crm_id', 'CRM ID: ')}}
					<div class="col-sm-6">
						{{ Form::text('crm_id', null, array('class' => 'form-control')) }}
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6" style="padding:10px 0 0 10px; width:47%;">
						{{-- {{ Form::submit('Add Account', array('class' => 'btn btn-success <i class="fa fa-btn fa-plus"></i>')) }} --}}
						<button type="submit" class="btn btn-success btn-lg btn-block">
							<i class="fa fa-btn fa-plus"></i> Add Account
						</button>
					</div>
				</div>
			</div>
		{!! Form::close() !!}
	</div>


	{{-- <div class="row">
		<div class="col-sm-8 col-md-offset-2">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/accounts/">{{ $backtitle }}</a>
      <h1>{{ $title }}</h1>
			<hr>
			<div class="form-group">

				{!! Form::open(array('route' => 'accounts..store')) !!}
				{{ Form::label('name', 'Account Name: ')}}
				<div class="col-sm-6">
					{{ Form::text('name', null, array('class' => 'form-control')) }}
				</div>
				{{ Form::label('crm_id', 'CRM ID: ')}}
				<div class="col-sm-6">
					{{ Form::text('crm_id', null, array('class' => 'form-control')) }}
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-6">
					{{ Form::submit('Add Account', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'padding:10px 0 0 10px; width:47%;')) }}
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div> --}}
@endsection
