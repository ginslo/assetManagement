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
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/products/product/{{ $product->id }}">{{ $backtitle }}</a>
			<h1>Editing {{ $product->name }}</h1>
			<form action="/products/product/{{ $product->id }}/update" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				{{-- <input type="hidden" name="id" value="{{ $product->id }}"> --}}
				<div class="form-group">
				<label for="name" class="col-sm-3 control-label">Product Name</label>
					<div class="col-sm-6">
						<input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
					</div>
				</div>
				<div class="form-group">
				<label for="name" class="col-sm-3 control-label">Slug</label>
					<div class="col-sm-6">
						<input type="text" name="slug" id="slug" class="form-control" value="{{ $product->slug }}">
					</div>
				</div>
				<div class="form-group">
					<label for="category" class="col-sm-3 control-label">Category</label>
						<div class="col-sm-6">
							{{ Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
				<label for="source_url" class="col-sm-3 control-label">Summary</label>
					<div class="col-sm-6">
						<textarea name="summary" id="summary" class="form-control" rows="8">{{ $product->summary }}</textarea>
						<script>
							CKEDITOR.replace( 'summary');
						</script>
					</div>
				</div>
				<div class="form-group">
				<label for="description" class="col-sm-3 control-label">Description</label>
					<div class="col-sm-6">
						<textarea name="description" id="description" class="form-control" rows="10">{{ $product->description }}</textarea>
						{{-- <script>
							CKEDITOR.replace( 'description');
						</script> --}}
					</div>
				</div>
				<div class="form-group">
				<label for="source_url" class="col-sm-3 control-label">Source URL</label>
					<div class="col-sm-6">
						<input type="text" name="source_url" id="source_url" class="form-control" value="{{ $product->source_url }}">
					</div>
				</div>
				<div class="form-group">
				<label for="sku" class="col-sm-3 control-label">SKU</label>
					<div class="col-sm-6">
						<input type="text" name="sku" id="sku" class="form-control" value="{{ $product->sku }}">
					</div>
				</div>
				<div class="form-group">
				<label for="meta_title" class="col-sm-3 control-label">Meta Title</label>
					<div class="col-sm-6">
						<input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ $product->meta_title }}">
					</div>
				</div>
				<div class="form-group">
				<label for="meta_keywords" class="col-sm-3 control-label">Meta Keywords</label>
					<div class="col-sm-6">
						<input type="text" name="meta_keywords" id="meta_keywords" class="form-control" value="{{ $product->meta_keywords }}">
					</div>
				</div>
				<div class="form-group">
				<label for="meta_description" class="col-sm-3 control-label">Meta Description</label>
					<div class="col-sm-6">
						<textarea name="meta_description" id="meta_description" class="form-control" rows="10">{{ $product->meta_description }}</textarea>
					</div>
				</div>
				<div class="form-group">
				<label for="status" class="col-sm-3 control-label">Status</label>
					<div class="col-sm-6">
						<input type="text" name="status" id="status" class="form-control" value="{{ $product->status }}">
					</div>
				</div>
				<div class="form-group">
				<label for="searchable" class="col-sm-3 control-label">Searchable?</label>
					<div class="col-sm-6">
						<input type="text" name="searchable" id="searchable" class="form-control" value="{{ $product->searchable }}">
					</div>
				</div>
				<div class="form-group">
				<label for="cost" class="col-sm-3 control-label">Cost</label>
					<div class="col-sm-6">
						<input type="text" name="cost" id="cost" class="form-control" value="{{ $product->cost }}">
					</div>
				</div>
				<div class="form-group">
				<label for="price" class="col-sm-3 control-label">Price</label>
					<div class="col-sm-6">
						<input type="text" name="price" id="price" class="form-control" value="{{ $product->price }}">
					</div>
				</div>
				<div class="form-group">
				<label for="recurring" class="col-sm-3 control-label">Recurring?</label>
					<div class="col-sm-6">
						<select name="state" class="form-control">
								<option value="0"{!! $product->recurring == 0 ? " selected=\"selected\"" : "" !!}>No</option>
								<option value="1"{!! $product->recurring == 1 ? " selected=\"selected\"" : "" !!}>Yes</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="period" class="col-sm-3 control-label">Recurring Period</label>
						<div class="col-sm-6">
							{{ Form::select('period_id', $periods, $product->period_id, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
	      	<div class="col-sm-offset-3 col-sm-6">
	        	<button type="submit" class="btn btn-success btn-lg btn-block">
	          	<i class="fa fa-btn fa-plus"></i> Update Product
	          </button>
	        </div>
	      </div>
    	</form>
		</div>
	</div>
@endsection
