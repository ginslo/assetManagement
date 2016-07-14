@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')
@endsection

@section('content')

  <div class="row">
    <div class="col-sm-9 col-md-offset-3">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/overview">Company Overview</a>
			<h1>{{ $title }}</h1>
			<table>
				<tr>
					<th class="servtable">Domain Name: </th><td class="servtable">{{ $domain_name->name }}</span></td>
				</tr>
				<tr>
	        <th class="servtable">Creation Date: </th><td class="servtable">{{ date('m-d-Y', strtotime($domain_name->creation_date)) }}</span></td>
				</tr>
				<tr>
	        <th class="servtable">Expiration Date: </th><td class="servtable">{{ date('m-d-Y', strtotime($domain_name->expiration_date)) }}</span></td>
				</tr>
				<tr>
	        <th class="servtable">Auto Renew: </th><td class="servtable">{{ $domain_name->auto_renew == 1 ? "Auto" : "Off" }}</span></td>
				</tr>
				{{-- @if($domain_name->registrar->id == 1)
					<tr>
		        <th class="servtable">Manage: </th><td class="servtable"><a target="_blank" href="{{ env('ENOMCENTRAL_URL')}}{{ $domain_name->DomainNameID }}">Manage</a></span></td>
					</tr>
				@endif --}}

				@if($domain_name->DomainNameID != NULL && $domain_name->registrar->id == 1 && Auth::user()->id == 2 )
					<th class="servtable">Manage: </th><td class="servtable"><a target="_blank" href="{{ env('ENOM_URL')}}{{ $domain_name->DomainNameID }}">Manage</a></span></td>
				@elseif($domain_name->DomainNameID != NULL && $domain_name->registrar->id == 1 && Auth::user()->id != 2)
					<th class="servtable">Manage: </th><td class="servtable"><a target="_blank" href="{{ env('ENOMCENTRAL_URL')}}{{ $domain_name->DomainNameID }}">Manage</a></span></td>
				@elseif($domain_name->registrar->id == 2)
					<th class="servtable">Manage: </th><td class="servtable"><a target="_blank" href="{{ env('GOOGLEDOMAIN_URL')}}">Manage</a></span></td>
				@elseif($domain_name->registrar->id == 3)
					<th class="servtable">Manage: </th><td class="servtable"><a target="_blank" href="{{ env('GODADDY_URL')}}">Manage</a></span></td>
				@else
					<th class="servtable">Manage: </th><td class="servtable"><a target="_blank" href="#">&nbsp;</a></span></td>
				@endif




				<tr>
					<th class="servtable">Registrar: </th><td class="servtable"><a href="{{ route('registrars.registrar_info.show', $domain_name->registrar->id) }}">{{ $domain_name->registrar->name }}</a></span></td>
				</tr>
			</table>
		</div>
  </div>
	<div class="row">
		<div class="col-sm-9 col-md-offset-3">
			<h2>My websites using {{ $domain_name->name }}</h2>
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
						<td class="servtable"><a href="{{ route('websites.my_website.show', $website->id) }}">{{ $website->name }}</a></td>
						<td class="servtable">{{ $website->subdomain }}</td>
						<td class="servtable"><a target="_blank" href="http://{{ $website->subdomain }}.{{ $domain_name->name }}">{{ $website->subdomain }}.{{ $domain_name->name }}</a></td>
						<td class="servtable"><a href="{{ route('servers.my_server.show', $website->server->id) }}">{{ $website->server->name }}</a></td>
						<td class="servtable"><a href="{{ route('servers.my_server.show', $website->server->id) }}">{{ $website->server->hostname }}</a></td>
					</tr>
				@endforeach
			</table>
			</div>
		</div>
@endsection
