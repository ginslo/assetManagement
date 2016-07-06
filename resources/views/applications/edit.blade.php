@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@endsection

@section('content')
	@include('common.errors')
	<div class="row">
		<div class="col-sm-11 col-md-11 col-md-offset-1">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/applications/application/{{ $application->id }}">{{ $backtitle }}</a>
			<h1>Editing {{ $application->name }}</h1>
			<form action="/applications/application/{{ $application->id }}/update" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				{{-- <input type="hidden" name="id" value="{{ $application->id }}"> --}}
				<div class="form-group">
				<label for="name" class="col-sm-3 control-label">Application Name</label>
					<div class="col-sm-6">
						<input type="text" name="name" id="name" class="form-control" value="{{ $application->name }}">
					</div>
				</div>
				<div class="form-group">
				<label for="name" class="col-sm-3 control-label">Slug</label>
					<div class="col-sm-6">
						<input type="text" name="slug" id="slug" class="form-control" value="{{ $application->slug }}">
					</div>
				</div>
				<div class="form-group">
				<label for="source_url" class="col-sm-3 control-label">Summary</label>
					<div class="col-sm-6">
						<textarea name="summary" id="summary" class="form-control" rows="8">{{ $application->summary }}</textarea>
						<script>
							CKEDITOR.replace( 'summary');
						</script>
					</div>
				</div>
				<div class="form-group">
				<label for="description" class="col-sm-3 control-label">Description</label>
					<div class="col-sm-6">
						<textarea name="description" id="description" class="form-control" rows="10">{{ $application->description }}</textarea>
						<script>
							CKEDITOR.replace( 'description');
						</script>
					</div>
				</div>
				<div class="form-group">
				<label for="source_url" class="col-sm-3 control-label">Source URL</label>
					<div class="col-sm-6">
						<input type="text" name="source_url" id="source_url" class="form-control" value="{{ $application->source_url }}">
					</div>
				</div>
				<div class="form-group">
	      	<div class="col-sm-offset-3 col-sm-6">
	        	<button type="submit" class="btn btn-success btn-lg btn-block">
	          	<i class="fa fa-btn fa-plus"></i> Update Company
	          </button>
	        </div>
	      </div>
    	</form>
		</div>
	</div>
@endsection
