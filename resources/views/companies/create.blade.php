@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@endsection
@section('content')
	@include('common.errors')
	<div class="row">
		<div class="col-sm-8 col-md-offset-2">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/companies/">{{ $backtitle }}</a>
			<h1>{{ $title }}</h1>
			{!! Form::open(array('route' => 'companies..store')) !!}
				<div class="form-group">
						{{ Form::label('name', 'Company Name: ')}}
					<div class="col-sm-6">{{ Form::text('name', null, array('class' => 'form-control')) }}</div>
						{{ Form::label('crm_id', 'CRM ID: ')}}
					<div class="col-sm-6">{{ Form::text('crm_id', null, array('class' => 'form-control')) }}</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6" style="padding:10px 0 0 10px; width:47%;">
						{{-- {{ Form::submit('Add Company', array('class' => 'btn btn-success <i class="fa fa-btn fa-plus"></i>')) }} --}}
						<button type="submit" class="btn btn-success btn-lg btn-block">
							<i class="fa fa-btn fa-plus"></i> Add Company
						</button>
					</div>
				</div>
			</div>
		{!! Form::close() !!}
	</div>
@endsection
