@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@section('content')
  <div class="row">
    <div class="col-sm-9 col-md-6 col-md-offset-3">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/servers/">All Servers</a>
			<h1><p style="float:right;"><a href="/servers/server/{{ $server->id }}/edit"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a></p>
			{{ $title }}</h1>
			<table>
				<tr>
					<th class="servtable">Description:</th><td class="servtable">{{ $server->name }}</td>
				</tr>
				<tr>
					<th class="servtable">Owner:</th><td class="servtable"><a href="/users/user/{{ $server->user_id }}">{{ $server->user->first_name }} {{ $server->user->last_name }}</a></span></td>
				</tr>
				<tr>
					<th class="servtable">Account:</th><td class="servtable"><a href="/accounts/account/{{ $server->user->account->id }}">{{ $server->user->account->name }}</a></span></td>
				</tr>
				<tr>
					<th class="servtable">Cost:</th><td class="servtable" align="center">${{ number_format( $server->cost , 2, '.', '') }}</span></td>
				</tr>
				<tr>
					<th class="servtable">Price:</th><td class="servtable" align="center">${{ number_format( $server->price , 2, '.', '') }}</span></td>
				</tr>

				<tr>
					<th class="servtable">Hostname:</th><td class="servtable">{{ $server->hostname }}</td>
				</tr>
				<tr>
					<th class="servtable">IP Public:</th><td class="servtable">{{ $server->ip_public }}</td>
				</tr>
				<tr>
					<th class="servtable">IP Private:</th><td class="servtable">{{ $server->ip_private }}</td>
				</tr>
				<tr>
	        <th class="servtable">Purpose:</th><td class="servtable"><a href="/purposes/purpose/{{ $server->purpose_id }}">{{ $server->purpose->name }}</a></span></td>
				</tr>
				<tr>
					<th class="servtable">Provider:</th><td class="servtable"><a href="/providers/provider/{{ $server->provider_id }}">{{ $server->provider->name }}</a></span></td>
				</tr>
				<tr>
	        <th class="servtable">Data Center:</th><td class="servtable"><a href="/data_centers/data_center/{{ $server->data_center_id }}">{{ $server->data_center->name }}</a></span></td>
				</tr>
				<tr>
					<th class="servtable">Instance ID:</th><td class="servtable">{{ $server->instance_id }}</td>
				</tr>
				<tr>
					<th class="servtable">Cores:</th><td class="servtable">{{ $server->cores }}	</td>
				</tr>
				<tr>
					<th class="servtable">Size:</th><td class="servtable">{{ $server->size }}	</td>
				</tr>
				<tr>
					<th class="servtable">Memory:</th><td class="servtable">{{ $server->memory }}	</td>
				</tr>
				<tr>
	        <th class="servtable">Distribution | Version:</th><td class="servtable"><a href="/distributions/distribution/{{ $server->distribution->id }}">{{ $server->distribution->name }}</a> | <a href="/distribution_versions/distribution_version/{{ $server->distribution_version->id }}">{{ $server->distribution_version->name }}</a></td>
				</tr>
				<tr>
	        <th class="servtable">Kernel:</th><td class="servtable">{{ $server->kernel }}	</td>
				</tr>
				<tr>
	        <th class="servtable">Repo Update:</th><td class="servtable">{{ $server->repo_update }}</span></td>
				</tr>
				<tr>
					<th class="servtable">State:</th><td class="servtable">{{ $serverstate }}	</td>
				</tr>
				<tr>
					<th class="servtable">Monitor:</th><td class="servtable"><a target="_blank" href="{{ env("MONITOR_URL") }}{{ $server->hostname }}">Nagios</a>	</td>
				</tr>
			</table>
    </div>
  </div>
	<div class="row">
		<div class="col-sm-9 col-md-6 col-md-offset-3">
			<h2>Websites On This Host</h2>
			<table>
				<tr>
					<th class="servtable">Name</th>
					<th class="servtable">URL</th>
				</tr>
				@foreach($websites as $website)
					<tr>
					<td class="servtable"><a href="/websites/website/{{ $website->id }}">{{ $website->name }}</a></td>
					<td class="servtable"><a target="_blank" href="http://{{ $website->subdomain }}.{{ $website->domain_name->name }}">{{ $website->subdomain }}.{{ $website->domain_name->name }}</a></td>
				</tr>
				@endforeach
			</table>
			<br /><br />
		</div>
	</div>
@endsection
