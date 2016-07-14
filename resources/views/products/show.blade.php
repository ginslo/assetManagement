@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@endsection

@section('content')

<div class="row">
	<div class="col-sm-8 col-md-offset-2">
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="/products/">All Products</a>
		<h1><p style="float:right;"><a href="{{ route('products.product.edit', $product->id) }}"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a></p>
		{{ $title }}</h1>
		<table>
				<tr>
						<th valign="top" style="padding:2px 5px 2px 5px; width:25%;">Name:</th>
						<td style="padding:2px 5px 2px 5px; width:75%;">{{ $product->name }}</td>
				</tr>
				<tr>
						<th valign="top" style="padding:2px 5px 2px 5px">Slug (front end link):</th>
						<td style="padding:2px 5px 2px 5px; width:75%;"><a href="{{ url('/services/'.$product->category->slug, $product->slug) }}">{{ url('/services/'.$product->category->slug) }}/ "<strong>{{ $product->slug }}</strong>"</a></td>
				</tr>
				<tr>
						<th valign="top" style="padding:2px 5px 2px 5px; width:25%;">Category:</th>
						<td style="padding:2px 5px 2px 5px; width:75%;"><a href="{{ route('categories.category.show', $product->category->id) }}">{{ $product->category->name }}</a></td>
				</tr>
    		<tr>
					<th valign="top" style="padding:2px 5px 2px 5px; width:25%;">Summary: </th>
					<td style="padding:2px 5px 2px 5px; width:75%;">{!! $product->summary !!}</td>
				</tr>
				<tr>
					<th valign="top" style="padding:2px 5px 2px 5px; width:25%;">Description: </th>
					<td style="padding:2px 5px 2px 5px; width:75%;">{!! $product->description !!}</td>
				</tr>
				<tr>
					<th valign="top" style="padding:2px 5px 2px 5px; width:25%;">Source URL: </th>
					<td style="padding:2px 5px 2px 5px; width:75%;"><a target="_blank" href="{{ $product->source_url }}">{{ $product->source_url }}</a></td>
				</tr>
				<tr>
					<th valign="top" style="padding:2px 5px 2px 5px; width:25%;">Cost: </th>
					<td style="padding:2px 5px 2px 5px; width:75%;">{{ $product->cost }}</td>
				</tr>
				<tr>
					<th valign="top" style="padding:2px 5px 2px 5px; width:25%;">Price: </th>
					<td style="padding:2px 5px 2px 5px; width:75%;">{{ $product->price }}</td>
				</tr>
				<tr>
					<th valign="top" style="padding:2px 5px 2px 5px; width:25%;">Recurring: </th>
					<td style="padding:2px 5px 2px 5px; width:75%;">{{ $product->recurring == 1 ? "Yes" : "No" }}</td>
				</tr>
				<tr>
					<th valign="top" style="padding:2px 5px 2px 5px; width:25%;">Recurring Period: </th>
					<td style="padding:2px 5px 2px 5px; width:75%;">{{ $product->period->name }}</td>
				</tr>
	</table>
  </div>
</div>
<div class="row">
	<div class="col-sm-9 col-md-offset-3">
		<h2>Websites running {{ $product->name }}</h2>
		<table>
			<tr>
				<th class="servtable">Website Name</th>
				<th class="servtable">Server Name</th>
				<th class="servtable">Server Hostname</th>
			</tr>
			@foreach($websites as $website)
				<tr>
					<td class="servtable"><a href="{{ route('websites.website.show', $website->id) }}">{{ $website->name }}</a></td>
					<td class="servtable"><a href="{{ route('servers.server.show', $website->server->id) }}">{{ $website->server->name }}</a></td>
					<td class="servtable"><a href="{{ route('servers.server.show', $website->server->id) }}">{{ $website->server->hostname }}</a></td>
				</tr>
			@endforeach
		</table>
		</div>
	</div>
@stop
