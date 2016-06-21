@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')

  <div class="row">
    <div class="col-sm-8 col-md-offset-2">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/domain_names/">All Domain Names</a>
			<h1><p style="float:right;"><a href="/domain_names/domain_name/{{ $domain_name->id }}/edit"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a></p>
			{{ $title }}</h1>
			<table>
				<tr>
					<th class="servtable">Domain Name: </th><td class="servtable">{{ $domain_name->name }}</span></td>
				</tr>
				<tr>
	        <th class="servtable">Creation Date: </th><td class="servtable">{{ $domain_name->creation_date }}</span></td>
				</tr>
				<tr>
	        <th class="servtable">Expiration Date: </th><td class="servtable">{{ $domain_name->expiration_date }}</span></td>
				</tr>
				<tr>
	        <th class="servtable">User: </th><td class="servtable"><a href="/users/user/{{ $domain_name->user->id }}">{{ $domain_name->user->first_name }} {{ $domain_name->user->last_name }}</a></span></td>
				</tr>
				<tr>
	        <th class="servtable">Account: </th><td class="servtable"><a href="/accounts/account/{{ $domain_name->user->account->id }}">{{ $domain_name->user->account->name }}</a></span></td>
				</tr>
				<tr>
					<th class="servtable">Registrar: </th><td class="servtable"><a href="/registrars/registrar/{{ $domain_name->registrar->id }}">{{ $domain_name->registrar->name }}</a></span></td>
				</tr>
				<tr>
					<th class="servtable">Cost: </th><td class="servtable">${{ number_format( $domain_name->cost , 2, '.', '') }}</span></td>
				</tr>
				<tr>
					<th class="servtable">Price: </th><td class="servtable">${{ number_format( $domain_name->price , 2, '.', '') }}</span></td>
				</tr>
			</table>
		</div>
  </div>
	<div class="row">
		<div class="col-sm-8 col-md-offset-2">
			<h2>Websites using {{ $domain_name->name }}</h2>
			<a href="/websites/create"><span title="Add New Website"><i class="fa fa-plus" aria-hidden="true"></i></span> New Website</a>
			<table>
				<tr>
					<th class="servtable">Website Name</th>
					<th class="servtable">Subdomain</th>
					<th class="servtable">Site URL</th>
					<th class="servtable">Server Name</th>
					<th class="servtable">Server Hostname</th>
				</tr>
				@foreach($websites as $website)
					<tr>
						<td class="servtable"><a href="/websites/website/{{ $website->id }}">{{ $website->name }}</a></td>
						<td class="servtable">{{ $website->subdomain }}</td>
						<td class="servtable"><a target="_blank" href="http://{{ $website->subdomain }}.{{ $domain_name->name }}">{{ $website->subdomain }}.{{ $domain_name->name }}</a></td>
						<td class="servtable"><a href="/servers/server/{{ $website->server->id }}">{{ $website->server->name }}</a></td>
						<td class="servtable"><a href="/servers/server/{{ $website->server->id }}">{{ $website->server->hostname }}</a></td>
					</tr>
				@endforeach
			</table>
			</div>
		</div>
@endsection
