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
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/products/">{{ $backtitle }}</a>
      <h1>{{ $title }}</h1>

			{!! Form::open(array('route' => 'products.product.store', 'data-parsley-validate' => '')) !!}
				{{-- <div class="form-group">
					{{ Form::label('name', 'Product Name', array('class' => 'col-sm-3 control-label')) }}
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
				</div> --}}

				<div class="form-group">
				<label for="name" class="col-sm-3 control-label">Product Name</label>
					<div class="col-sm-6">
						<input type="text" name="name" id="name" class="form-control" value="">
					</div>
				</div>
				<div class="form-group">
				<label for="name" class="col-sm-3 control-label">Slug</label>
					<div class="col-sm-6">
						<input type="text" name="slug" id="slug" class="form-control" value="">
					</div>
				</div>
				<div class="form-group">
					<label for="distribution" class="col-sm-3 control-label">Category</label>
						<div class="col-sm-6">
							{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
							{{-- {{ Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control']) }} --}}
						</div>
				</div>
				<div class="form-group">
				<label for="source_url" class="col-sm-3 control-label">Summary</label>
					<div class="col-sm-6">
						<textarea name="summary" id="summary" class="form-control" rows="8"></textarea>
						{{-- <script>
							CKEDITOR.replace( 'summary');
						</script> --}}
					</div>
				</div>
				<div class="form-group">
				<label for="description" class="col-sm-3 control-label">Description</label>
					<div class="col-sm-6">
						<textarea name="description" id="description" class="form-control" rows="10"></textarea>
						{{-- <script>
							CKEDITOR.replace( 'description');
						</script> --}}
					</div>
				</div>
				<div class="form-group">
				<label for="source_url" class="col-sm-3 control-label">Source URL</label>
					<div class="col-sm-6">
						<input type="text" name="source_url" id="source_url" class="form-control" value="">
					</div>
				</div>
				<div class="form-group">
				<label for="sku" class="col-sm-3 control-label">SKU</label>
					<div class="col-sm-6">
						<input type="text" name="sku" id="sku" class="form-control" value="">
					</div>
				</div>
				<div class="form-group">
				<label for="meta_title" class="col-sm-3 control-label">Meta Title</label>
					<div class="col-sm-6">
						<input type="text" name="meta_title" id="meta_title" class="form-control" value="">
					</div>
				</div>
				<div class="form-group">
				<label for="meta_keywords" class="col-sm-3 control-label">Meta Keywords</label>
					<div class="col-sm-6">
						<input type="text" name="meta_keywords" id="meta_keywords" class="form-control" value="">
					</div>
				</div>
				<div class="form-group">
				<label for="meta_description" class="col-sm-3 control-label">Meta Description</label>
					<div class="col-sm-6">
						<textarea name="meta_description" id="meta_description" class="form-control" rows="10"></textarea>
					</div>
				</div>
				<div class="form-group">
				<label for="status" class="col-sm-3 control-label">Status</label>
					<div class="col-sm-6">
						<input type="text" name="status" id="status" class="form-control" value="">
					</div>
				</div>
				<div class="form-group">
				<label for="searchable" class="col-sm-3 control-label">Searchable?</label>
					<div class="col-sm-6">
						<input type="text" name="searchable" id="searchable" class="form-control" value="">
					</div>
				</div>
				<div class="form-group">
				<label for="cost" class="col-sm-3 control-label">Cost</label>
					<div class="col-sm-6">
						<input type="text" name="cost" id="cost" class="form-control" value="">
					</div>
				</div>
				<div class="form-group">
				<label for="price" class="col-sm-3 control-label">Price</label>
					<div class="col-sm-6">
						<input type="text" name="price" id="price" class="form-control" value="">
					</div>
				</div>
				<div class="form-group">
				<label for="recurring" class="col-sm-3 control-label">Recurring?</label>
					<div class="col-sm-6">
						<select name="state" class="form-control">
								<option value="0">No</option>
								<option value="1">Yes</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="period" class="col-sm-3 control-label">Recurring Period</label>
						<div class="col-sm-6">
							{{ Form::select('period_id', $periods, null, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-success btn-lg btn-block submit-button-margin">
							<i class="fa fa-btn fa-plus"></i> Add Product
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
