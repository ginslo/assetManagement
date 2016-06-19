@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')

@section('content')

<div class="row">
	<div class="col-sm-12 col-md-6">
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="/oss/">All oss</a>
		<h1>{{ $title }}</h1>
			<table>
				<tr>
					<th class="servtable">Details: </th><td class="servtable">{{ $os->name }} <a href="/oss/os/{{ $os->id }}/edit"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a></td>
				</tr>
				<tr>
					<th class="servtable">Source Website: </th><td class="servtable"><a target="_blank" href="{{ $os->source_url }}">{{ $os->source_url }}</a></td>
				</tr>
			</table>
  </div>
</div>

<div class="row">
	<div class="col-sm-12 col-md-8">
		<h2>Servers running {{ $os->name }}</h2>
		<table>
			<tr>
				<th class="servtable">Name</th>
				<th class="servtable">HostName</th>
				<th class="servtable">OS Version</th>
				<th class="servtable">State</th>
			</tr>
			@foreach($servers as $server)
				<tr>
					<td class="servtable"><a href="/servers/server/{{ $server->id }}">{{ $server->name }}</a></td>
					<td class="servtable"><a href="/servers/server/{{ $server->id }}">{{ $server->hostname }}</a></td>
					<td class="servtable">{{ $os->name }} {{ $server->os_version->name }}</td>
					<td class="servtable"> {{ $serverstate = $server->state == 1 ? "Running" : "Stopped" }}</td>
				</tr>
			@endforeach
		</table>
		</div>
	</div>
@endsection
