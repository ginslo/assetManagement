@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@endsection

@section('content')

<div class="row">
	<div class="col-sm-9 col-md-offset-3">
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="/distributions/">All distributions</a>
		<h1>{{ $title }}</h1>
			<table>
				<tr>
					<th class="servtable">Details: </th><td class="servtable">{{ $distribution->name }} <a href="/distributions/distribution/{{ $distribution->id }}/edit"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a></td>
				</tr>
				<tr>
					<th class="servtable">Source Website: </th><td class="servtable"><a target="_blank" href="{{ $distribution->source_url }}">{{ $distribution->source_url }}</a></td>
				</tr>
			</table>
  </div>
</div>

<div class="row">
	<div class="col-sm-9 col-md-offset-3">
		<h2>Servers running {{ $distribution->name }}</h2>
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
					<td class="servtable">{{ $distribution->name }}</td>
					<td class="servtable"><a href="/distribution_versions/distribution_version/{{ $server->distribution_version->id }}">{{ $server->distribution_version->name }}</a></td>
					<td class="servtable"> {{ $serverstate = $server->state == 1 ? "Running" : "Stopped" }}</td>
				</tr>
			@endforeach
		</table>
		</div>
	</div>
@endsection
