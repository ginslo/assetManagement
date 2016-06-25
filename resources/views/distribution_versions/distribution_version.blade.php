@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')

@section('content')

<div class="row">
	<div class="col-sm-9 col-sm-6 col-md-offset-3">
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="/distribution_versions/">All distribution_versions</a>
		<h1><p style="float:right;"><a href="/distribution_versions/distribution_version/{{ $distribution_version->id }}/edit"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
		</p>Version: {{ $distribution_version->name }}</h1>
    <p class="leftcol">Details: <span class="propbox pull-right">{{ $distribution_version->name }}</p>
  </div>
</div>

<div class="row">
	<div class="col-sm-9 col-md-offset-3">
		<h2>Servers running {{ $distribution_version->distribution->name }} {{ $distribution_version->name }}</h2>
		<table>
			<tr>
				<th class="servtable">Name</th>
				<th class="servtable">Distro Name</th>
				<th class="servtable">Distro Version</th>
				<th class="servtable">State</th>
			</tr>
			@foreach($servers as $server)
				<tr>
					<td class="servtable"><a href="/servers/server/{{ $server->id }}">{{ $server->name }}</a></td>
					<td class="servtable"><a href="/distributions/distribution/{{ $server->distribution->id }}">{{ $server->distribution->name }}</a></td>
					<td class="servtable">{{ $server->distribution->name }} {{ $server->distribution_version->name }}</td>
					<td class="servtable"> {{ $serverstate = $server->state == 1 ? "Running" : "Stopped" }}</td>
				</tr>
			@endforeach
		</table>
		</div>
	</div>
@endsection
