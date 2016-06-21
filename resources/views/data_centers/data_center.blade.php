@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')

  <div class="row">
    <div class="col-sm-9 col-md-offset-3">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/data_centers/">All Data Centers</a>
			<h1><p style="float:right;"><a href="/data_centers/data_center/{{ $data_center->id }}/edit"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a></p>
      {{ $data_center->provider->name }} {{ $title }}</h1>
			<table>
				<tr>
					<th class="servtable">Data Center Name: </th><td class="servtable">{{ $data_center->name }}</span></td>
				</tr>
				<tr>
					<th class="servtable">Provider: </th><td class="servtable"><a href="/providers/provider/{{ $data_center->provider_id }}">{{ $data_center->provider->name }}</a></span></td>
				</table>
		</div>
  </div>
	<div class="row">
		<div class="col-sm-9 col-md-offset-3">
			<h2>Servers at {{ $data_center->provider->name }} - {{ $data_center->name }}</h2>
			<table>
				<tr>
					<th class="servtable">Server Name</th>
				</tr>
				@foreach($servers as $server)
					<tr>
						<td class="servtable"><a href="/servers/server/{{ $server->id }}">{{ $server->name }}</a></td>
					</tr>
				@endforeach
			</table>
			</div>
		</div>

		{{-- <div class="row">
			<div class="col-sm-12 col-md-6">
				<h2>Websites at {{ $data_center->provider->name }} - {{ $data_center->name }}</h2>
				<table>
					<tr>
						<th class="servtable">Website Name</th>
						<th class="servtable">Server Name</th>
						<th class="servtable">Server Hostname</th>
					</tr>
					@foreach($websites as $website)
						<tr>
							<td class="servtable"><a href="/websites/website/{{ $website->id }}">{{ $website->name }}</a></td>
							<td class="servtable"><a href="/servers/server/{{ $website->server->id }}">{{ $website->server->name }}</a></td>
							<td class="servtable"><a href="/servers/server/{{ $website->server->id }}">{{ $website->server->hostname }}</a></td>
						</tr>
					@endforeach
				</table>
				</div>
			</div> --}}
@endsection
