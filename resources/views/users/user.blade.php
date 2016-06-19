@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')

  <div class="row">
    <div class="col-sm-12 col-md-6">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/users/">All Users</a>
			<h1><p style="float:right;"><a href="/users/user/{{ $user->id }}/edit"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
			<a target="_blank" href="{{ env('CRM_USER_URL')}}{{ $user->crm_id }}"><span title="CRM View"><i class="fa fa-eye" aria-hidden="true"></i></span></a></span></p>
			{{ $title }}</h1>
        <p class="leftcol">Name: <span class="propbox pull-right">{{ $user->first_name }} {{ $user->last_name }}</p>
        <p class="leftcol">Email: <span class="propbox pull-right">{{ $user->email }}</span></p>
        <p class="leftcol">Account: <span class="propbox pull-right"><a href="/accounts/account/{{ $user->account_id }}">{{ $user->account->name }}</a></span></p>
        <p class="leftcol">Admin Status: <span class="propbox pull-right">{{ $isadmin }}</span></p>
    </div>
  </div>
	<div class="row">
		<div class="col-sm-12 col-md-8">
			<h2>Associated Servers</h2>
			<table>
				<tr>
					<th class="servtable">Name</th>
					<th class="servtable">Hostname</th>
					<th class="servtable">Operating System</th>
					<th class="servtable">Provider</th>
					<th class="servtable">DC</th>
				</tr>
				@foreach($servers as $server)
					<tr>
						<td class="servtable"><a href="/servers/server/{{ $server->id }}">{{ $server->name }}</a></li>
						<td class="servtable"><a href="/servers/server/{{ $server->id }}">{{ $server->hostname }}</a></li>
						<td class="servtable"><a href="/oss/os/{{ $server->os->id }}">{{ $server->os->name }} {{ $server->os_version->name }}</a></li>
						<td class="servtable"><a href="/providers/provider/{{$server->provider->id}}">{{$server->provider->name}}</a></li>
						<td class="servtable"><a href="/data_centers/data_center/{{ $server->data_center->id }}">{{ $server->data_center->name }}</a></li>
					</tr>
				@endforeach
			</table>
			<br /><br />
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 col-md-8">
			<h2>Associated Websites</h2>
			<table>
				<tr>
					<th class="servtable">Name</th>
					<th class="servtable">URL</th>
					<th class="servtable">Server</th>
					<th class="servtable">Hostname</th>
				</tr>
				@foreach($websites as $website)
					<tr>
					<td class="servtable"><a href="/websites/website/{{ $website->id }}">{{ $website->name }}</a></td>
					<td class="servtable"><a target="_blank" href="http://{{ $website->subdomain }}.{{ $website->domain_name->name }}">{{ $website->subdomain }}.{{ $website->domain_name->name }}</a></td>
					<td class="servtable"><a href="/servers/server/{{ $website->server->id }}">{{ $website->server->name }}</a></td>
					<td class="servtable"><a href="/servers/server/{{ $website->server->id }}">{{ $website->server->hostname }}</a></td>
				</tr>
				@endforeach
			</table>
			<br /><br />
		</div>
	</div>
@endsection
