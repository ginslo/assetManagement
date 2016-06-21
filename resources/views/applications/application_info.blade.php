@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')

@section('content')

<div class="row">
	<div class="col-sm-9 col-md-offset-3">
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="/home">Home</a>
		<h2>{{ $title }}</h1>
    <p><span id="leftcol">Name: </span><span id="rightcol">{{ $application->name }}</span></p>
    <p><span id="leftcol">Source URL: </span><span id="rightcol"><a target="_blank" href="{{ $application->source_url }}">{{ $application->source_url }}</a></span></p>
  </div>
</div>
<div class="row">
	<div class="col-sm-9 col-md-offset-3">
		<h2>My Websites Running {{ $application->name }}</h2>
		<table>
			<tr>
				<th class="servtable">Website Name</th>
				<th class="servtable">Server Name</th>
				<th class="servtable">Server Hostname</th>
			</tr>
			@foreach($websites as $website)
				@if($website->user_id == Auth::user()->id)
					<tr>
						<td class="servtable"><a href="/websites/my_website/{{ $website->id }}">{{ $website->name }}</a></td>
						<td class="servtable"><a href="/servers/my_server/{{ $website->server->id }}">{{ $website->server->name }}</a></td>
						<td class="servtable"><a href="/servers/my_server/{{ $website->server->id }}">{{ $website->server->hostname }}</a></td>
					</tr>
				@endif
			@endforeach
		</table>
		</div>
	</div>
@stop
