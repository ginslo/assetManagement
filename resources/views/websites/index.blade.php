@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')
@endsection

@section('content')

<div class="row">
	<div class="col-sm-12 col-md-offset-0">
		<h2>{{ $title }}</h2>
		<a href="/websites/create"><span title="Add New Website"><i class="fa fa-plus" aria-hidden="true"></i></span> New Website</a>
		<br />


		<table width="100%">
			<tr>
				<th class="servtable">ID</th>
				<th class="servtable">E</th>
				<th class="servtable">Website Name</th>
				<th class="servtable">Full URL</th>
				<th class="servtable">Application</th>
				<th class="servtable">Provider</th>
				<th class="servtable">Server Hostname</th>
				<th class="servtable">Owner</th>
				<th class="servtable">Company</th>
				<th class="servtable">CI Link</th>
				<th class="servtable">Tracker</th>
				<th class="servtable">Monitor</th>
			@foreach ($websites as $website)
			<tr>
				<td class="servtable">{{ $website->id }}</td>
				<td class="servtable"><a href="{{ route('websites.website.edit', $website->id) }}"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a></td>
				<td class="servtable"><a href="{{ route('websites.website.show', $website->id) }}">{{ $website->name }}</a></td>
				<td class="servtable"> <a target="_blank" href="http://{{ $website->subdomain }}.{{ $website->domain_name->name }}">{{ $website->subdomain }}.{{ $website->domain_name->name }}</a></td>
				<td class="servtable"> <a href="{{ route('products.product.show', $website->product->id) }}">{{ $website->product->name }}</a></td>
				<td class="servtable"> <a href="{{ route('providers.provider.show', $website->server->provider->id) }}">{{ $website->server->provider->name }}</a></td>
				<td class="servtable"> <a href="{{ route('servers.server.show', $website->server->id) }}">{{ $website->server->hostname }}</a></td>
				<td class="servtable"> <a href="{{ route('users.user.show', $website->user->id) }}">{{ $website->user->first_name }} {{ $website->user->last_name }}</a></td>
				<td class="servtable"> <a href="{{ route('companies.company.show', $website->user->company->id) }}">{{ $website->user->company->name }}</a></td>
				@if($website->ci_name == "None")
					<td class="servtable">&nbsp;</td>
				@else
					<td class="servtable"><a target="_blank" href="{{ env('CI_URL') }}/{{ $website->ci_name }}">{{ env('CI_NAME') }}</a></td>
				@endif
				@if($website->bugtracker_name == "")
					<td class="servtable">&nbsp;</td>
				@else
					<td class="servtable"><a target="_blank" href="{{ env('BUGTRACKER_URL') }}/{{ $website->bugtracker_name }}">{{ env("BUGTRACKER_NAME")}}</a></td>
				@endif
				<td class="servtable"><a target="_blank" href="{{ env('MONITOR_URL') }}{{ $website->server->hostname }}">{{ env('MONITOR_NAME') }}</a></td>
			</tr>
			@endforeach
		</table>
		{{ $websites->links() }}
		<br /><br /><br />
	</div>
</div>
@endsection
