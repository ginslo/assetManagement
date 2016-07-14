@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')
@endsection

@section('content')
<div class="row">
	<div class="col-sm-10 col-md-offset-1">
		<h2>{{ $title }}</h2>
		<a href="/products/create"><span title="Add New Product"><i class="fa fa-plus" aria-hidden="true"></i></span> New Product</a>
		<br />
		<table>
			<tr>
				<th class="servtable">Product Name</th>
				<th class="servtable">Slug</th>
				<th class="servtable">Front end</th>
				<th class="servtable">Cost</th>
				<th class="servtable">Price</th>
				<th class="servtable">Recurring</th>
				<th class="servtable">Period</th>
				<th class="servtable">category</th>
				<th class="servtable">Source</th>
      </tr>
				@foreach ($products as $product)
			<tr>
				<td class="servtable"><a href="{{ route('products.product.show', $product->id) }}">{{ $product->name }}</a></td>
				<td class="servtable"><a href="{{ route('products.product.show', $product->id) }}">{{ $product->slug }}</a></td>
				<td class="servtable"><a href="/services/{{ $product->category->slug }}/{{ $product->slug }}">{{ $product->slug }}</a></td>
				<td class="servtable" align="right"> ${{ number_format( $product->cost , 2, '.', '') }}</td>
				<td class="servtable" align="right"> ${{ number_format( $product->price , 2, '.', '') }}</td>
				<td class="servtable"> {{ $product->recurring == 1 ? "Yes" : "No" }}</td>
				<td class="servtable"> {{ $product->period->name }}</td>
				<td class="servtable"><a href="{{ route('categories.category.show', $product->category->id) }}">{{ $product->category->name }}</a></td>
				<td class="servtable"><a target="_blank" href="{{ $product->source_url }}">{{ $product->source_url }}</a></td>
			</tr>
				@endforeach
		</table>
		{{ $products->links() }}
	</div>
</div>
@endsection
