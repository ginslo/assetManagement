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
      <i class="fa fa-backward" aria-hidden="true"></i> <a href="/categories/">{{ $backtitle }}</a>
      <h1>{{ $title }}</h1>
      {!! Form::open(array('route' => 'categories.category.store', 'data-parsley-validate' => '')) !!}

			{{-- <form action="/categories/category/{{ $category->id }}/update" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				{{ method_field('PATCH') }} --}}
				<div class="form-group">
				<label for="name" class="col-sm-3 control-label">Category</label>
					<div class="col-sm-6">
						<input type="text" name="name" id="name" class="form-control" value="">
					</div>
				</div>
				<div class="form-group">
				<label for="slug" class="col-sm-3 control-label">Slug</label>
					<div class="col-sm-6">
						<input type="text" name="slug" id="slug" class="form-control" value="">
					</div>
				</div>
				<div class="form-group">
	      	<div class="col-sm-offset-3 col-sm-6">
	        	<button type="submit" class="btn btn-success btn-lg btn-block">
	          	<i class="fa fa-btn fa-plus"></i> Create Category
	          </button>
	        </div>
	      </div>
    	</form>

		</div>
	</div>

@endsection
