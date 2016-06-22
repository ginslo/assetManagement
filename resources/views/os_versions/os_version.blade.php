@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')

@section('content')

<div class="row">
	<div class="col-sm-9 col-md-4 col-md-offset-3">
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="/os_versions/">All os_versions</a>
		<h1><p style="float:right;"><a href="/os_versions/os_version/{{ $os_version->id }}/edit"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
		</p>{{ $os_version->name }}</h1>
    <p class="leftcol">Details: <span class="propbox pull-right">{{ $os_version->name }}</p>
  </div>
</div>

<div class="row">
	<div class="col-sm-9 col-md-offset-3">
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
					{{-- <td class="servtable"><a href="/servers/server/{{ $server->id }}">{{ $server->hostname }}</a></td>
					<td class="servtable">{{ $os->name }} {{ $server->os_version->name }}</td>
					<td class="servtable"> {{ $serverstate = $server->state == 1 ? "Running" : "Stopped" }}</td> --}}
				</tr>
			@endforeach
		</table>
		</div>
	</div>
@endsection
