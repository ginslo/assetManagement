@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@endsection
@section('content')
	@include('common.errors')
	@include('common.messages')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>My Stuff</h2></div>
	                <div class="panel-body">
	                  <h3>My Info</h3>
	                  <table>
	                    <tr>
	                      <th class="servtable">Name</th><td class="servtable">{{ $users->first_name }} {{ $users->last_name }}</td>
											</tr>
											<tr>
	                      <th class="servtable">Email</th><td class="servtable">{{ $users->email }}</td>
											</tr>
											{{-- <tr>
	                      <th class="servtable">Phone</th><td class="servtable">n/a</td>
											</tr>
											<tr>
	                      <th class="servtable">Billing method</th><td class="servtable">n/a</td>
											</tr> --}}
											<tr>
	                      <th class="servtable">Company</th><td class="servtable"><a href="/companies/my_company/{{ $users->company->id }}">{{ $users->company->name }}</a></td>
											</tr>
									</table>
								</div>

                <div class="panel-body">
                  <h3>My Domain Names</h3>
                  <table width="100%">
                    <tr>
                      <th class="servtable">Domain Name</th>
                      <th class="servtable">Registrar</th>
                      <th class="servtable">Manage</th>
                      <th class="servtable">Creation Date</th>
                      <th class="servtable">Expiration Date</th>
                      <th class="servtable">Price/Year</th>
                      <th class="servtable">Auto Renew</th>
                      <th class="servtable">Company</th>
                    <?php $ttl=0; ?>
                    @foreach ($domain_names as $domain_name)
                    <tr>
                      <td class="servtable"><a href="/domain_names/my_domain_name/{{ $domain_name->id }}">{{ $domain_name->name }}</a></td>
                      <td class="servtable"><a href="/registrars/registrar_info/{{ $domain_name->registrar->id }}">{{ $domain_name->registrar->name }}</a></td>
											@if($domain_name->DomainNameID != NULL && $domain_name->registrar->id == 1 && Auth::user()->id == 2 )
								        <td class="servtable"><a target="_blank" href="{{ env('ENOM_URL')}}{{ $domain_name->DomainNameID }}">Manage</a></span></td>
											@elseif($domain_name->DomainNameID != NULL && $domain_name->registrar->id == 1 && Auth::user()->id != 2)
								        <td class="servtable"><a target="_blank" href="{{ env('ENOMCENTRAL_URL')}}{{ $domain_name->DomainNameID }}">Manage</a></span></td>
											@elseif($domain_name->registrar->id == 2)
												<td class="servtable"><a target="_blank" href="{{ env('GOOGLEDOMAIN_URL')}}">Manage</a></span></td>
											@elseif($domain_name->registrar->id == 3)
												<td class="servtable"><a target="_blank" href="{{ env('GODADDY_URL')}}">Manage</a></span></td>
											@else
												<td class="servtable"><a target="_blank" href="#">&nbsp;</a></span></td>
											@endif

                      <td class="servtable">{{ date('m-d-Y', strtotime($domain_name->creation_date)) }}</td>
                      <td class="servtable">{{ date('m-d-Y', strtotime($domain_name->expiration_date)) }}</td>
                      <td class="servtable" align="right"> ${{ number_format( $domain_name->price , 2, '.', '') }}</td>
											<td class="servtable">{{ $domain_name->auto_renew == 1 ? "Auto" : "Off" }}</td>
                      <td class="servtable"><a href="/companies/my_company/{{ $domain_name->user->company->id }}">{{ $domain_name->user->company->name }}</a></td>
                    </tr>
                    <?php $ttl=$ttl + $domain_name->price; ?>
                    @endforeach
                    <tr>
                      <td class="servtable" align="right" colspan="5">Total:</td>
                      <td class="servtable" align="right">${{ number_format($ttl,2) }}</td>
                      <td class="servtable" align="left"> &nbsp;</td>
                    </tr>
                  </table>
								</div>
								<div class="panel-body">
                  <h3>My Servers</h3>
                  <table width="100%">
              			<tr>
              				<th class="servtable">Name</th>
              				<th class="servtable">Hostname</th>
              				<th class="servtable">IP Address</th>
              				<th class="servtable">Distribution</th>
              				{{-- <th class="servtable">User</th> --}}
              				<th class="servtable">Company</th>
              				<th class="servtable">Provider</th>
              				<th class="servtable">Data Center</th>
              				<th class="servtable">Price/Month</th>
              				<th class="servtable">State</th>
                      <?php $ttl=0; ?>
              				@foreach ($servers as $server)
              				<tr>
              					<td class="servtable"><a href="/servers/my_server/{{ $server->id }}">{{ $server->name }}</a></td>
              					<td class="servtable"><a href="/servers/my_server/{{ $server->id }}">{{ $server->hostname }}</a></td>
              					<td class="servtable">{{ $server->ip_public }}</td>
              					<td class="servtable">{{ $server->distribution->name }} {{ $server->distribution_version->name }}</td>
              					<td class="servtable"><a href="/companies/my_company/{{ $server->user->company_id }}">{{ $server->user->company->name }}</a></td>
              					<td class="servtable"><a href="/providers/provider_info/{{ $server->provider->id }}">{{ $server->provider->name }}</a></td>
              					<td class="servtable"> <a href="/data_centers/data_center_info/{{ $server->data_center->id }}">{{ $server->data_center->name }}</a></td>
              					<td class="servtable" align="right"> ${{ number_format( $server->price , 2, '.', '') }}</td>
              					<td class="servtable"> {{ $serverstate = $server->state == 1 ? "Running" : "Stopped" }}</td>
              				</tr>
                      <?php $ttl=$ttl + $server->price; ?>
              				@endforeach
                      <tr>
                        <td class="servtable" align="right" colspan="7">Total:</td>
                        <td class="servtable" align="right">${{ number_format($ttl,2) }}</td>
                        <td class="servtable" align="left">&nbsp;</td>
                      </tr>
              		</table>
								</div>
								<div class="panel-body">
                  <h3>My Websites</h3>
                  <table width="100%">
              			<tr>
              				<th class="servtable">Website Name</th>
              				<th class="servtable">Full URL</th>
              				<th class="servtable">Application</th>
              				<th class="servtable">Provider</th>
              				<th class="servtable">Data Center</th>
              				<th class="servtable">Server Hostname</th>
              				<th class="servtable">Company</th>
              				<th class="servtable">Tracker</th>
              			@foreach ($websites as $website)
              			<tr>
              				<td class="servtable"><a href="/websites/my_website/{{ $website->id }}">{{ $website->name }}</a></td>
              				<td class="servtable"> <a target="_blank" href="http://{{ $website->subdomain }}.{{ $website->domain_name->name }}">{{ $website->subdomain }}.{{ $website->domain_name->name }}</a></td>
              				<td class="servtable"> <a href="/applications/application_info/{{ $website->application->id }}">{{ $website->application->name }}</a></td>
              				<td class="servtable"> <a href="/providers/provider_info/{{ $website->server->provider->id }}">{{ $website->server->provider->name }}</a></td>
              				<td class="servtable"> <a href="/data_centers/data_center_info/{{ $website->server->data_center->id }}">{{ $website->server->data_center->name }}</a></td>
              				<td class="servtable"> <a href="/servers/my_server/{{ $website->server->id }}">{{ $website->server->hostname }}</a></td>
              				<td class="servtable"> <a href="/companies/my_company/{{ $website->user->company->id }}">{{ $website->user->company->name }}</a></td>
              				@if($website->bugtracker_name == "")
              					<td class="servtable">&nbsp;</td>
              				@else
              					<td class="servtable"><a target="_blank" href="{{ env('BUGTRACKER_URL') }}/{{ $website->bugtracker_name }}">{{ env("BUGTRACKER_NAME")}}</a></td>
              				@endif
              			</tr>
              			@endforeach
              		</table>

                </div>
            </div>
        </div>
    </div>




</div>
@endsection
