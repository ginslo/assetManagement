@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')
<div class="row">
	<div class="col-sm-12 col-md-12">
		<h2>{{ $title }}</h2>
		<a href="/servers/create"><span title="Add New Server"><i class="fa fa-plus" aria-hidden="true"></i></span> New Server</a>
		<br />
		<table>
			<tr>
				<th class="servtable">ID</th>
				<th class="servtable">E</th>
				<th class="servtable">Name</th>
				<th class="servtable">Hostname</th>
				<th class="servtable">IP Address</th>
				<th class="servtable">Operating System</th>
				<th class="servtable">User</th>
				<th class="servtable">Account</th>
				<th class="servtable">Provider</th>
				<th class="servtable">Data Center</th>
				<th class="servtable">Price</th>
				<th class="servtable">State</th>
				<th class="servtable">Monitor</th>
				@foreach ($servers as $server)
				<tr>
					<td class="servtable">{{ $server->id }}</td>
					<td class="servtable"><a href="/servers/server/{{ $server->id }}/edit"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></td>
					<td class="servtable"><a href="/servers/server/{{ $server->id }}">{{ $server->name }}</a></td>
					<td class="servtable"><a href="/servers/server/{{ $server->id }}">{{ $server->hostname }}</a></td>
					<td class="servtable"><a href="/servers/server/{{ $server->id }}">{{ $server->ip_public }}</a></td>
					<td class="servtable"><a href="/oss/os/{{ $server->os->id }}">{{ $server->os->name }} {{ $server->os_version->name }}</a></td>
					<td class="servtable"><a href="/users/user/{{ $server->user_id }}">{{ $server->user->first_name }} {{ $server->user->last_name }}</a></td>
					<td class="servtable"><a href="/accounts/account/{{ $server->user->account_id }}">{{ $server->user->account->name }}</a></td>
					<td class="servtable"> {{ $server->provider->name }}</td>
					<td class="servtable"> {{ $server->data_center->name }}</td>
					<td class="servtable" align="right"> ${{ number_format( $server->price , 2, '.', '') }}</td>
					<td class="servtable"> {{ $serverstate = $server->state == 1 ? "Running" : "Stopped" }}</td>
					<td class="servtable"><a target="_blank" href="{{ env("MONITOR_URL") }}{{ $server->hostname }}">Nagios</a></td>
				</tr>
				@endforeach
		</table>
		{{ $servers->links() }}
	</div>
</div>
@endsection
