@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@endsection

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}

@endsection

{{-- @section('sidebar') --}}
@section('content')
	@include('common.errors')
	<div class="row">
		<div class="col-sm-10 col-md-8 col-md-offset-2">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/applications/">{{ $backtitle }}</a>
      <h1>{{ $title }}</h1>

			{!! Form::open(array('route' => 'applications.application.store', 'data-parsley-validate' => '')) !!}
				<div class="form-group">
					{{ Form::label('name', 'Application Name', array('class' => 'col-sm-3 control-label')) }}
						<div class="col-sm-6">
							{{ Form::text('name', null, array('class' => 'form-control', 'required' => '')) }}
						</div>
				</div>
				<div class="form-group">
					{{ Form::label('slug', 'Slug', array('class' => 'col-sm-3 control-label')) }}
						<div class="col-sm-6">
							{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '')) }}
						</div>
				</div>

				<div class="form-group">
					{{ Form::label('source_url', 'Source URL', array('class' => 'col-sm-3 control-label')) }}
						<div class="col-sm-6">
							{{ Form::text('source_url', null, array('class' => 'form-control', 'required' => '', 'type="url"' => '')) }}
						</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-success btn-lg btn-block submit-button-margin">
							<i class="fa fa-btn fa-plus"></i> Add Application
						</button>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}

@endsection
