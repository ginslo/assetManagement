@extends('layouts.master')
@section('title', $title)
@section('sidebar')
@endsection

@section('content')

<div class="row">
	<div class="col-sm-10 col-md-8 col-md-offset-2">
		{{-- <p style="float:right;"><img src="/images/screenshots/file.jpg" alt="" width="300"/></p> --}}
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="/websites/">All Websites</a>
		<h1><p style="float:right;"><a href="/websites/website/{{ $website->id }}/edit"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a></p>
		Website: {{ $website->name }}</h2>
		<table>
			<tr>
				<th class="servtable">Base Domain Name:</th><td class="servtable"><a href="/domain_names/domain_name/{{ $website->domain_name->id }}">{{ $website->domain_name->name }}</a></td>
			</tr>
			<tr>
		    <th class="servtable">Website URL:</th><td class="servtable"><a target="_blank" href="http://{{ $website->subdomain }}.{{ $website->domain_name->name }}">{{ $website->subdomain }}.{{ $website->domain_name->name }}</a></td>
			</tr>
			<tr>
		    <th class="servtable">Application:</th><td class="servtable"><a href="/applications/application/{{ $website->application->id }}">{{ $website->application->name }}</a></td>
			</tr>
			<tr>
		    <th class="servtable">Owned by:</th><td class="servtable"><a href="/users/user/{{ $users->id }}">{{ $users->first_name }} {{ $users->last_name }}</a> (<a href="/companies/company/{{ $companies->id }}">{{ $companies->name }}</a>)</td>
			</tr>
			<tr>
		    <th class="servtable">Server:</th><td class="servtable"><a href="/servers/server/{{ $website->server->id }}">{{ $website->server->name }}</a></td>
			</tr>
			<tr>
		    <th class="servtable">Server Hostname:</th><td class="servtable"><a href="/servers/server/{{ $website->server->id }}">{{ $website->server->hostname }}</a></td>
			</tr>
			<tr>
		    <th class="servtable">Server Provider:</th><td class="servtable"><a href="/providers/provider/{{ $website->server->provider->id }}">{{ $website->server->provider->name }}</a></td>
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
			<tr>
				<th class="servtable">{{ env('CI_NAME')}}:</th><td class="servtable"><a target="_blank" href="{{ env('CI_URL') }}{{ $website->ci_name }}">{{ $website->ci_name }}</a></td>
			</tr>
		</table>
  </div>
</div>
@stop
