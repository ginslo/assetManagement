@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@section('content')
  <div class="row">
    <div class="col-sm-12 col-md-6">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/applications/application/{{ $application->id }}">{{ $backtitle }}</a>
      <h1>Editing {{ $application->name }}</h1>
    </div>
  </div>
	<div class="row">
		<div class="col-sm-12 col-md-6">
			<form action="/applications/application/{{ $application->id }}/update" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				{{-- <input type="hidden" name="id" value="{{ $application->id }}"> --}}
				<div class="form-group">
					<label for="name" class="col-sm-3 control-label">Account</label>
						<div class="col-sm-6">
							<input type="text" name="name" id="name" class="form-control" value="{{ $application->name }}">
						</div>
					<label for="source_url" class="col-sm-3 control-label">Source URL</label>
						<div class="col-sm-6">
							<input type="text" name="source_url" id="source_url" class="form-control" value="{{ $application->source_url }}">
						</div>
				</div>
				<div class="form-group">
	      	<div class="col-sm-offset-3 col-sm-6">
	        	<button type="submit" class="btn btn-default">
	          	<i class="fa fa-btn fa-plus"></i> Update Account
	          </button>
	        </div>
	      </div>
    	</form>
		</div>
	</div>
@endsection
