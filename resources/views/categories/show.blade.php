@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')
@endsection

@section('content')
	@include('common.errors')

  <div class="row">
    <div class="col-sm-8 col-md-offset-4">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/categories/">{{ $backtitle }}</a>
			<h1>{{ $title }}</h1>
			<table>
				<tr>
					<th class="servtable"><a href="{{ route('categories.category.edit', $category->id)}}"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a> |
					Name: </th><td class="servtable">{{ $category->name }}</td>
				</table>
    </div>
  </div>

	<div class="row">
		<div class="col-sm-8 col-md-offset-4">
			<h2>Products associated with {{ $category->name }}</h2>
			<table>
				<tr>
					<th class="servtable">Name</th>
				</tr>
				@foreach($products as $product)
					<tr>
						<td class="servtable"><a href="{{ route('products.product.show', $product->id) }}">{{ $product->name }}</a></td>
					</tr>
				@endforeach
			</table>
			</div>
		</div>
	</div>

@endsection
