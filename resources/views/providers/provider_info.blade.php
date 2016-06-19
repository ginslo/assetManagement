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
				<th class="servtable">Details: </th><td class="servtable">{{ $provider->name }}</td>
			</tr>
			</table>
  </div>
</div>

{{-- <div class="row">
	<div class="col-sm-12 col-md-6">
		<h2>Data Centers at {{ $provider->name }}</h2>
		<ul>
			@foreach($data_centers as $data_center)
				<li><a href="/data_centers/data_center_info/{{ $data_center->id }}">{{ $data_center->id }} {{ $data_center->name }}</a>
			@endforeach
		</ul>
		</div>
	</div> --}}

<div class="row">
	<div class="col-sm-12 col-md-8">
		<h2>My Servers at {{ $provider->name }}</h2>
		<table>
			<tr>
				<th class="servtable">Server Name</th>
				<th class="servtable">Hostname</th>
				<th class="servtable">Data Center</th>
				<th class="servtable">user</th>
			</tr>
			@foreach($servers as $server)
        @if($server->user_id == Auth::user()->id)
  				<tr>
  					<td class="servtable"><a href="/servers/my_server/{{ $server->id }}">{{ $server->name }}</a></td>
  					<td class="servtable"><a href="/servers/my_server/{{ $server->id }}">{{ $server->hostname }}</a></td>
  					<td class="servtable"><a href="/data_centers/data_center_info/{{ $server->data_center->id }}">{{ $server->data_center->name }}</td>
  					<td class="servtable">{{ $server->user->first_name }} {{ $server->user->last_name }}</td>
  				</tr>
        @endif
			@endforeach
		</table>
		</div>
	</div>

@endsection
