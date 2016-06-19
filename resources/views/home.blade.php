@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <p>
                    Hello {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!
                    {{-- (
                    @if(Auth::user()->is_admin == 1)
                      Admin
                    @else
                      not an admin
                    @endif
                  ) --}}
                  </p>
                  <h1>Account Overview</h2>
                  <h3>Domain Names</h3>
                  <table width="100%">
                    <tr>
                      <th class="servtable">Domain Name</th>
                      <th class="servtable">Registrar</th>
                      <th class="servtable">Creation Date</th>
                      <th class="servtable">Expiration Date</th>
                      <th class="servtable">Price/Year</th>
                      {{-- <th class="servtable">User</th> --}}
                      <th class="servtable">Account</th>
                      {{-- <th class="servtable">Manage</th> --}}
                    <?php $ttl=0; ?>
                    @foreach ($domain_names as $domain_name)
                    <tr>
                      <td class="servtable"><a href="/domain_names/my_domain_name/{{ $domain_name->id }}">{{ $domain_name->name }}</a></td>
                      <td class="servtable"><a href="/registrars/registrar_info/{{ $domain_name->registrar->id }}">{{ $domain_name->registrar->name }}</a></td>
                      <td class="servtable">{{ $domain_name->creation_date }}</td>
                      <td class="servtable">{{ $domain_name->expiration_date }}</td>
                      <td class="servtable" align="right"> ${{ number_format( $domain_name->price , 2, '.', '') }}</td>
                      {{-- <td class="servtable"><a href="/users/user/{{ $domain_name->user->id }}">{{ $domain_name->user->first_name }} {{ $domain_name->user->last_name }}</a></td> --}}
                      <td class="servtable"><a href="/accounts/my_account/{{ $domain_name->user->account->id }}">{{ $domain_name->user->account->name }}</a></td>
                      {{-- <td class="servtable"><a href="/registrars/registrar/{{ $domain_name->registrar->id }}">{{ $domain_name->registrar->name }}</a></td> --}}
                    </tr>
                    <?php $ttl=$ttl + $domain_name->price; ?>
                    @endforeach
                    <tr>
                      <td class="servtable" align="right" colspan="4">Total:</td>
                      <td class="servtable" align="right">${{ number_format($ttl,2) }}</td>
                      <td class="servtable" align="left"> &nbsp;</td>
                    </tr>
                  </table>
                  <h3>Servers</h3>
                  <table width="100%">
              			<tr>
              				<th class="servtable">Name</th>
              				<th class="servtable">Hostname</th>
              				<th class="servtable">IP Address</th>
              				<th class="servtable">Operating System</th>
              				{{-- <th class="servtable">User</th> --}}
              				<th class="servtable">Account</th>
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
              					<td class="servtable">{{ $server->os->name }} {{ $server->os_version->name }}</td>
              					{{-- <td class="servtable"><a href="/users/user/{{ $server->user_id }}">{{ $server->user->first_name }} {{ $server->user->last_name }}</a></td> --}}
              					<td class="servtable"><a href="/accounts/my_account/{{ $server->user->account_id }}">{{ $server->user->account->name }}</a></td>
              					<td class="servtable"> {{ $server->provider->name }}</td>
              					<td class="servtable"> {{ $server->data_center->name }}</td>
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
                  <h3>Websites</h3>
                  <table width="100%">
              			<tr>
              				<th class="servtable">Website Name</th>
              				<th class="servtable">Full URL</th>
              				<th class="servtable">Application</th>
              				<th class="servtable">Provider</th>
              				<th class="servtable">Server Hostname</th>
              				{{-- <th class="servtable">Owner</th> --}}
              				<th class="servtable">Account</th>
              				{{-- <th class="servtable">CI Link</th> --}}
              				<th class="servtable">Tracker</th>
              			@foreach ($websites as $website)
              			<tr>
              				<td class="servtable"><a href="/websites/my_website/{{ $website->id }}">{{ $website->name }}</a></td>
              				<td class="servtable"> <a target="_blank" href="http://{{ $website->subdomain }}.{{ $website->domain_name->name }}">{{ $website->subdomain }}.{{ $website->domain_name->name }}</a></td>
              				<td class="servtable"> <a href="/applications/application_info/{{ $website->application->id }}">{{ $website->application->name }}</a></td>
              				<td class="servtable"> <a href="/providers/provider_info/{{ $website->server->provider->id }}">{{ $website->server->provider->name }}</a></td>
              				<td class="servtable"> <a href="/servers/my_server/{{ $website->server->id }}">{{ $website->server->hostname }}</a></td>
              				{{-- <td class="servtable"> <a href="/users/user/{{ $website->user->id }}">{{ $website->user->first_name }} {{ $website->user->last_name }}</a></td> --}}
              				<td class="servtable"> <a href="/accounts/my_account/{{ $website->user->account->id }}">{{ $website->user->account->name }}</a></td>
              				{{-- @if($website->ci_name == "None")
              					<td class="servtable">&nbsp;</td>
              				@else
              					<td class="servtable"><a target="_blank" href="{{ env('CI_URL') }}/{{ $website->ci_name }}">{{ env('CI_NAME') }}</a></td>
              				@endif --}}
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
