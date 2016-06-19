@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')

@section('content')

<div class="row">
	<div class="col-sm-12 col-md-6">
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="/providers/">All Providers</a>
		<h1><p style="float:right;"><a href="/providers/provider/{{ $provider->id }}/edit"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
		<a target="_blank" href="{{ env('CRM_ACCT_URL')}}{{ $provider->crm_id }}"><span title="CRM View"><i class="fa fa-eye" aria-hidden="true"></i></span></a></span></p>
		{{ $title }}</h1>
		<table>
			<tr>
				<th class="servtable">Details: </th><td class="servtable">{{ $provider->name }}</td>
			</tr>
			<tr>
    		<th class="servtable">CRM: </th><td class="servtable"><a target="_blank" href="{{ env('CRM_ACCT_URL')}}{{ $provider->crm_id }}">{{ env('CRM_NAME') }}</a></td>
			</tr>
		</table>
  </div>
</div>

<div class="row">
	<div class="col-sm-12 col-md-6">
		<h2>Data Centers at {{ $provider->name }}</h2>
		<ul>
			@foreach($data_centers as $data_center)
				<li><a href="/data_centers/data_center/{{ $data_center->id }}">{{ $data_center->id }} {{ $data_center->name }}</a>
			@endforeach
		</ul>
		</div>
	</div>

<div class="row">
	<div class="col-sm-12 col-md-6">
		<h2>Servers at {{ $provider->name }}</h2>
		<table>
			<tr>
				<th class="servtable">Server Name</th>
				<th class="servtable">Hostname</th>
				<th class="servtable">Data Center</th>
			</tr>
			@foreach($servers as $server)
				<tr>
					<td class="servtable"><a href="/servers/server/{{ $server->id }}">{{ $server->name }}</a></td>
					<td class="servtable"><a href="/servers/server/{{ $server->id }}">{{ $server->hostname }}</a></td>
					<td class="servtable"><a href="/data_centers/data_center/{{ $server->data_center->id }}">{{ $server->data_center->name }}</td>
				</tr>
			@endforeach
		</table>
		</div>
	</div>

		{{-- {{ $server->data_center }} --}}

	{{-- <div class="row">
		<div class="col-sm-12 col-md-6">
			<h2>Websites at {{ $provider->name }}</h2>
			<table>
				<tr>
					<th class="servtable">Website Name</th>
					<th class="servtable">URL</th>
					<th class="servtable">Data Center</th>
				</tr> --}}
				{{-- @foreach($websites as $website) --}}
					{{-- <tr> --}}
						{{-- {{ $website->name }} --}}
						{{-- <td class="servtable"><a href="/websites/website/{{ $website->id }}">{{ $website->name }}</a></td> --}}
						{{-- <td class="servtable"><a href="http://{{ $domain_name->subdomain }}.{{ $domain_name->name }}">{{ $domain_name->subdomain }}.{{ $domain_name->name }}</a></td>
						<td class="servtable"><a href="/data_centers/data_center/{{ $data_center->id }}">{{ $data_center->name }}</td> --}}
					{{-- </tr> --}}
				{{-- @endforeach --}}
			{{-- </table>
			<br /><br />
			</div>
		</div> --}}
@endsection
