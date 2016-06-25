@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')

  <div class="row">
    <div class="col-sm-9 col-md-offset-3">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/home/">Home</a>
			<h1>{{ $data_center->provider->name }} {{ $title }}</h1>
			<table>
				<tr>
					<th class="servtable">Data Center Name: </th><td class="servtable">{{ $data_center->name }}</span></td>
				</tr>
				<tr>
					<th class="servtable">Provider: </th><td class="servtable"><a href="/providers/provider_info/{{ $data_center->provider_id }}">{{ $data_center->provider->name }}</a></span></td>
				</table>
		</div>
  </div>
	<div class="row">
		<div class="col-sm-9 col-md-offset-3">
			<h2>My Servers at {{ $data_center->provider->name }} - {{ $data_center->name }}</h2>
      <table>
  			<tr>
  				<th class="servtable">Server Name</th>
  				<th class="servtable">Hostname</th>
  			</tr>
  			@foreach($servers as $server)
          @if($server->user_id == Auth::user()->id)
    				<tr>
    					<td class="servtable"><a href="/servers/my_server/{{ $server->id }}">{{ $server->name }}</a></td>
    					<td class="servtable"><a href="/servers/my_server/{{ $server->id }}">{{ $server->hostname }}</a></td>
    				</tr>
          @endif
  			@endforeach
  		</table>
			</div>
		</div>
@endsection
