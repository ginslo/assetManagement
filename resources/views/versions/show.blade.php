@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@endsection

@section('content')

<div class="row">
	<div class="col-sm-9 col-sm-6 col-md-offset-3">
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="/versions/">All versions</a>
		<h1><p style="float:right;"><a href="{{ route('versions.version.edit', $version->id) }}"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
		</p>Version: {{ $version->name }}</h1>
    <p class="leftcol">Details: <span class="propbox pull-right">{{ $version->name }}</p>
  </div>
</div>

<div class="row">
	<div class="col-sm-9 col-md-offset-3">
		<h2>Servers running {{ $version->distribution->name }} {{ $version->name }}</h2>
		<table>
			<tr>
				<th class="servtable">Name</th>
				<th class="servtable">Distro Name</th>
				<th class="servtable">Distro Version</th>
				<th class="servtable">State</th>
			</tr>
			@foreach($servers as $server)
				<tr>
					<td class="servtable"><a href="{{ route('servers.server.show', $server->id) }}">{{ $server->name }}</a></td>
					<td class="servtable"><a href="{{ route('distributions.distribution.show', $server->distribution->id) }}">{{ $server->distribution->name }}</a></td>
					<td class="servtable">{{ $server->distribution->name }} {{ $server->version->name }}</td>
					<td class="servtable"> {{ $serverstate = $server->state == 1 ? "Running" : "Stopped" }}</td>
				</tr>
			@endforeach
		</table>
		</div>
	</div>
@endsection
