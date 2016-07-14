@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@endsection

@section('content')

<div class="row">
	<div class="col-sm-9 col-md-offset-3">
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="/overview">Company Overview</a>
		<h2>{{ $title }}</h1>
    <p><span id="leftcol">Name: </span><span id="rightcol">{{ $product->name }}</span></p>
    <p><span id="leftcol">Source URL: </span><span id="rightcol"><a target="_blank" href="{{ $product->source_url }}">{{ $product->source_url }}</a></span></p>
  </div>
</div>
<div class="row">
	<div class="col-sm-9 col-md-offset-3">
		<h2>My Websites Running {{ $product->name }}</h2>
		<table>
			<tr>
				<th class="servtable">Website Name</th>
				<th class="servtable">Server Name</th>
				<th class="servtable">Server Hostname</th>
			</tr>
			@foreach($websites as $website)
				@if($website->user_id == Auth::user()->id)
					<tr>
						<td class="servtable"><a href="{{ route('websites.my_website.show', $website->id) }}">{{ $website->name }}</a></td>
						<td class="servtable"><a href="{{ route('servers.my_server.show', $website->server->id) }}">{{ $website->server->name }}</a></td>
						<td class="servtable"><a href="{{ route('servers.my_server.show', $website->server->id) }}">{{ $website->server->hostname }}</a></td>
					</tr>
				@endif
			@endforeach
		</table>
		</div>
	</div>
@stop
