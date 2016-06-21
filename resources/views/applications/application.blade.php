@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')

@section('content')

<div class="row">
	<div class="col-sm-9 col-md-offset-3">
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="/applications/">All Applications</a>
		<h1><p style="float:right;"><a href="/applications/application/{{ $application->id }}/edit"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a></p>
		{{ $title }}</h1>
    <p><span id="leftcol">Name: </span><span id="rightcol">{{ $application->name }}</span></p>
    <p><span id="leftcol">Source URL: </span><span id="rightcol"><a target="_blank" href="{{ $application->source_url }}">{{ $application->source_url }}</a></span></p>
  </div>
</div>
<div class="row">
	<div class="col-sm-9 col-md-offset-3">
		<h2>Websites running {{ $application->name }}</h2>
		<table>
			<tr>
				<th class="servtable">Website Name</th>
				<th class="servtable">Server Name</th>
				<th class="servtable">Server Hostname</th>
			</tr>
			@foreach($websites as $website)
				<tr>
					<td class="servtable"><a href="/websites/website/{{ $website->id }}">{{ $website->name }}</a></td>
					<td class="servtable"><a href="/servers/server/{{ $website->server->id }}">{{ $website->server->name }}</a></td>
					<td class="servtable"><a href="/servers/server/{{ $website->server->id }}">{{ $website->server->hostname }}</a></td>
				</tr>
			@endforeach
		</table>
		</div>
	</div>
@stop
