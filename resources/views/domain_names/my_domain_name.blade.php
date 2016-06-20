@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')

  <div class="row">
    <div class="col-sm-12 col-md-6">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/home">Home</a>
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
				{{-- <tr>
	        <th class="servtable">Account: </th><td class="servtable"><a href="/accounts/my_account/{{ $domain_name->user->account->id }}">{{ $domain_name->user->account->name }}</a></span></td>
				</tr> --}}
				<tr>
					<th class="servtable">Registrar: </th><td class="servtable"><a href="/registrars/registrar_info/{{ $domain_name->registrar->id }}">{{ $domain_name->registrar->name }}</a></span></td>
				</tr>
			</table>
		</div>
  </div>
	<div class="row">
		<div class="col-sm-12 col-md-8">
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
						<td class="servtable"><a href="/websites/my_website/{{ $website->id }}">{{ $website->name }}</a></td>
						<td class="servtable">{{ $website->subdomain }}</td>
						<td class="servtable"><a target="_blank" href="http://{{ $website->subdomain }}.{{ $domain_name->name }}">{{ $website->subdomain }}.{{ $domain_name->name }}</a></td>
						<td class="servtable"><a href="/servers/my_server/{{ $website->server->id }}">{{ $website->server->name }}</a></td>
						<td class="servtable"><a href="/servers/my_server/{{ $website->server->id }}">{{ $website->server->hostname }}</a></td>
					</tr>
				@endforeach
			</table>
			</div>
		</div>
@endsection
