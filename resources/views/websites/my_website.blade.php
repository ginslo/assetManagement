@extends('layouts.master')
@section('title', $title)
@section('sidebar')

@section('content')

<div class="row">
	<div class="col-sm-12 col-md-6">
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="/home">Home</a>
		<h2>Website: {{ $website->name }}</h2>
		<table>
			<tr>
				<th class="servtable">Base Domain Name:</th><td class="servtable"><a href="/domain_names/my_domain_name/{{ $website->domain_name->id }}">{{ $website->domain_name->name }}</a></td>
			</tr>
			<tr>
		    <th class="servtable">Website URL:</th><td class="servtable"><a target="_blank" href="http://{{ $website->subdomain }}.{{ $website->domain_name->name }}">{{ $website->subdomain }}.{{ $website->domain_name->name }}</a></td>
			</tr>
			<tr>
		    <th class="servtable">Application:</th><td class="servtable"><a href="/applications/application_info/{{ $website->application->id }}">{{ $website->application->name }}</a></td>
			</tr>
			<tr>
		    <th class="servtable">Server:</th><td class="servtable"><a href="/servers/my_server/{{ $website->server->id }}">{{ $website->server->name }}</a></td>
			</tr>
			<tr>
		    <th class="servtable">Server Hostname:</th><td class="servtable"><a href="/servers/my_server/{{ $website->server->id }}">{{ $website->server->hostname }}</a></td>
			</tr>
			<tr>
		    <th class="servtable">Server Provider:</th><td class="servtable"><a href="/providers/provider_info/{{ $website->server->provider->id }}">{{ $website->server->provider->name }}</a></td>
			</tr>
		</table>


				<h1>Management Links</h1>
		<table>
			<tr>
				<th class="servtable">{{ env('BUGTRACKER_NAME')}}:</th><td class="servtable"><a target="_blank" href="{{ env("BUGTRACKER_URL") }}/{{ $website->bugtracker_name }}">{{ $website->bugtracker_name }}</a></td>
			</tr>
			<tr>
				<th class="servtable">{{ env('MONITOR_NAME')}}:</th><td class="servtable"><a target="_blank" href="{{ env('MONITOR_URL') }}{{ $website->server->hostname }}">{{ $website->server->hostname }}</a></td>
			</tr>
		</table>
  </div>
</div>
@stop
