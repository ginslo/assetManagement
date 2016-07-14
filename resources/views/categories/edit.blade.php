@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')
@endsection
@section('content')
@include('common.errors')
  <div class="row">
    <div class="col-sm-12 col-md-6">
        {{-- <p class="leftcol">Name: <span class="propbox pull-right">{{ $category->name }}</span></p> --}}
    </div>
  </div>

	<div class="row">
		<div class="col-sm-10 col-md-8 col-md-offset-2">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/categories/category/{{ $category->id }}">{{ $backtitle }}</a>
			<h1>Editing {{ $category->name }}</h1>

			<form action="/categories/category/{{ $category->id }}/update" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
				<label for="name" class="col-sm-3 control-label">Category</label>
					<div class="col-sm-6">
						<input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
					</div>
				</div>

				<div class="form-group">
				<label for="slug" class="col-sm-3 control-label">Slug</label>
					<div class="col-sm-6">
						<input type="text" name="slug" id="slug" class="form-control" value="{{ $category->slug }}">
					</div>
				</div>

				<div class="form-group">
				<label for="description" class="col-sm-3 control-label">description</label>
					<div class="col-sm-6">
						<textarea name="description" id="description" class="form-control" rows="8">{{ $category->description }}</textarea>
					</div>
				</div>

				<div class="form-group">
				<label for="short_description" class="col-sm-3 control-label">short_description</label>
					<div class="col-sm-6">
						<textarea name="short_description" id="short_description" class="form-control" rows="4">{{ $category->short_description }}</textarea>
					</div>
				</div>

				<div class="form-group">
				<label for="meta_title" class="col-sm-3 control-label">meta_title</label>
					<div class="col-sm-6">
						<input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ $category->meta_title }}">
					</div>
				</div>

				<div class="form-group">
				<label for="meta_keywords" class="col-sm-3 control-label">meta_keywords</label>
					<div class="col-sm-6">
						<input type="text" name="meta_keywords" id="meta_keywords" class="form-control" value="{{ $category->meta_keywords }}">
					</div>
				</div>

				<div class="form-group">
				<label for="meta_description" class="col-sm-3 control-label">meta_description</label>
					<div class="col-sm-6">
						<textarea name="meta_description" id="meta_description" class="form-control" rows="4">{{ $category->meta_description }}</textarea>
					</div>
				</div>

				<div class="form-group">
				<label for="status" class="col-sm-3 control-label">status</label>
					<div class="col-sm-6">
						<input type="text" name="status" id="status" class="form-control" value="{{ $category->status }}">
					</div>
				</div>

				<div class="form-group">
				<label for="searchable" class="col-sm-3 control-label">searchable</label>
					<div class="col-sm-6">
						<input type="text" name="searchable" id="searchable" class="form-control" value="{{ $category->searchable }}">
					</div>
				</div>

				<div class="form-group">
	      	<div class="col-sm-offset-3 col-sm-6">
	        	<button type="submit" class="btn btn-success btn-lg btn-block">
	          	<i class="fa fa-btn fa-plus"></i> Update Category
	          </button>
	        </div>
	      </div>
    	</form>

		</div>
	</div>

@endsection
