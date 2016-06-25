@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('content')
	@include('common.errors')
	@include('common.messages')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Search Results for "{{ $search }}"</h2></div>
                  <div class="panel-body">
                    @if(count($domain_names) == 0)
                      <h3> No Domain Names Matched </h3>
                    @else
                      <h3>Domain Names</h3>
                      <table width="100%">
                        <tr>
                          <th class="servtable">Domain Name</th>
                          <th class="servtable">Registrar</th>
                          <th class="servtable">Manage</th>
                          <th class="servtable">Creation Date</th>
                          <th class="servtable">Expiration Date</th>
                          <th class="servtable">Price/Year</th>
                          <th class="servtable">Account</th>
                        <?php $ttl=0; ?>
                        @foreach ($domain_names as $domain_name)
                        <tr>
                          <td class="servtable"><a href="/domain_names/domain_name/{{ $domain_name->id }}">{{ $domain_name->name }}</a></td>
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
                          <td class="servtable"><a href="/accounts/account/{{ $domain_name->user->account->id }}">{{ $domain_name->user->account->name }}</a></td>
                        </tr>
                        <?php $ttl=$ttl + $domain_name->price; ?>
                        @endforeach
                        <tr>
                          <td class="servtable" align="right" colspan="5">Total:</td>
                          <td class="servtable" align="right">${{ number_format($ttl,2) }}</td>
                          <td class="servtable" align="left"> &nbsp;</td>
                        </tr>
                      </table>
                    @endif
                  </div>
                  <div class="panel-body">
                    @if(count($servers) == 0)
                      <h3> No Servers Matched </h3>
                    @else
                        <h3>Servers</h3>
                        <table width="100%">
                    			<tr>
                    				<th class="servtable">Name</th>
                    				<th class="servtable">Hostname</th>
                    				<th class="servtable">IP Address</th>
                    				<th class="servtable">Distribution</th>
                    				{{-- <th class="servtable">User</th> --}}
                    				<th class="servtable">Account</th>
                    				<th class="servtable">Provider</th>
                    				<th class="servtable">Data Center</th>
                    				<th class="servtable">Price/Month</th>
                    				<th class="servtable">State</th>
                            <?php $ttl=0; ?>
                    				@foreach ($servers as $server)
                    				<tr>
                    					<td class="servtable"><a href="/servers/server/{{ $server->id }}">{{ $server->name }}</a></td>
                    					<td class="servtable"><a href="/servers/server/{{ $server->id }}">{{ $server->hostname }}</a></td>
                    					<td class="servtable">{{ $server->ip_public }}</td>
                    					<td class="servtable">{{ $server->distribution->name }} {{ $server->distribution_version->name }}</td>
                    					<td class="servtable"><a href="/accounts/account/{{ $server->user->account_id }}">{{ $server->user->account->name }}</a></td>
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
                      @endif
                  </div>
                  <div class="panel-body">
                    @if(count($websites) == 0)
                      <h3> No Websites Matched </h3>
                    @else
                      <h3>Websites</h3>
                      <table width="100%">
                  			<tr>
                  				<th class="servtable">Website Name</th>
                  				<th class="servtable">Full URL</th>
                  				<th class="servtable">Application</th>
                  				<th class="servtable">Provider</th>
                  				<th class="servtable">Data Center</th>
                  				<th class="servtable">Server Hostname</th>
                  				<th class="servtable">Account</th>
                  				<th class="servtable">Tracker</th>
                  			@foreach ($websites as $website)
                  			<tr>
                  				<td class="servtable"><a href="/websites/website/{{ $website->id }}">{{ $website->name }}</a></td>
                  				<td class="servtable"> <a target="_blank" href="http://{{ $website->subdomain }}.{{ $website->domain_name->name }}">{{ $website->subdomain }}.{{ $website->domain_name->name }}</a></td>
                  				<td class="servtable"> <a href="/applications/application_info/{{ $website->application->id }}">{{ $website->application->name }}</a></td>
                  				<td class="servtable"> <a href="/providers/provider_info/{{ $website->server->provider->id }}">{{ $website->server->provider->name }}</a></td>
                  				<td class="servtable"> <a href="/data_centers/data_center_info/{{ $website->server->data_center->id }}">{{ $website->server->data_center->name }}</a></td>
                  				<td class="servtable"> <a href="/servers/server/{{ $website->server->id }}">{{ $website->server->hostname }}</a></td>
                  				<td class="servtable"> <a href="/accounts/account/{{ $website->user->account->id }}">{{ $website->user->account->name }}</a></td>
                  				@if($website->bugtracker_name == "")
                  					<td class="servtable">&nbsp;</td>
                  				@else
                  					<td class="servtable"><a target="_blank" href="{{ env('BUGTRACKER_URL') }}/{{ $website->bugtracker_name }}">{{ env("BUGTRACKER_NAME")}}</a></td>
                  				@endif
                  			</tr>
                  			@endforeach
                  		</table>
                    @endif
                  </div>
                  <div class="panel-body">
                    @if(count($users) == 0)
                      <h3> No Users Matched </h3>
                    @else
                      <h3>Users</h3>
                      <table>
                  			<tr>
                  				<th class="servtable">Full Name</th>
                  				<th class="servtable">Email</th>
                  			@foreach ($users as $user)
                  			<tr>
                  				<td class="servtable"><a href="/users/user/{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</a></td>
                  				<td class="servtable"><a href="/users/user/{{ $user->id }}">{{ $user->email }}</a></td>
                  			</tr>
                  			@endforeach
                      </table>
                      @endif
                  </div>
                  <div class="panel-body">
                    @if(count($providers) == 0)
                      <h3> No Providers Matched </h3>
                    @else
                      <h3>Providers</h3>
                      <table>
                  			<tr>
                  				<th class="servtable">Name</th>
                  				{{-- <th class="servtable">Email</th> --}}
                  			@foreach ($providers as $provider)
                  			<tr>
                  				<td class="servtable"><a href="/providers/provider/{{ $provider->id }}">{{ $provider->name }}</a></td>
                  				{{-- <td class="servtable"><a href="/users/user/{{ $user->id }}">{{ $user->email }}</a></td> --}}
                  			</tr>
                  			@endforeach
                      </table>
                      @endif
                  </div>
                  <div class="panel-body">
                    @if(count($applications) == 0)
                      <h3> No Applications Matched </h3>
                    @else
                      <h3>Applications</h3>
                      <table>
                        <tr>
                          <th class="servtable">Name</th>
                          {{-- <th class="servtable">Email</th> --}}
                        @foreach ($applications as $application)
                        <tr>
                          <td class="servtable"><a href="/applications/application/{{ $application->id }}">{{ $application->name }}</a></td>
                          {{-- <td class="servtable"><a href="/users/user/{{ $user->id }}">{{ $user->email }}</a></td> --}}
                        </tr>
                        @endforeach
                      </table>
                      @endif
                  </div>
                  <div class="panel-body">
                    @if(count($distributions) == 0)
                      <h3> No Distributions Matched </h3>
                    @else
                      <h3>Distributions</h3>
                      <table>
                  			<tr>
                  				<th class="servtable">Name</th>
                  				{{-- <th class="servtable">Email</th> --}}
                  			@foreach ($distributions as $distribution)
                  			<tr>
                  				<td class="servtable"><a href="/distributions/distribution/{{ $distribution->id }}">{{ $distribution->name }}</a></td>
                  				{{-- <td class="servtable"><a href="/users/user/{{ $user->id }}">{{ $user->email }}</a></td> --}}
                  			</tr>
                  			@endforeach
                      </table>
                      @endif
                  </div>
                  <div class="panel-body">
                    @if(count($registrars) == 0)
                      <h3> No Registrars Matched </h3>
                    @else
                      <h3>Registrars</h3>
                      <table>
                  			<tr>
                  				<th class="servtable">Name</th>
                  				{{-- <th class="servtable">Email</th> --}}
                  			@foreach ($registrars as $registrar)
                  			<tr>
                  				<td class="servtable"><a href="/registrars/registrar/{{ $registrar->id }}">{{ $registrar->name }}</a></td>
                  				{{-- <td class="servtable"><a href="/users/user/{{ $user->id }}">{{ $user->email }}</a></td> --}}
                  			</tr>
                  			@endforeach
                      </table>
                      @endif
                  </div>
            </div>
        </div>
    </div>




</div>
@endsection
