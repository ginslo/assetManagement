@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')
<div class="row">
	<div class="col-sm-8 col-md-offset-4">
		<h2>{{ $title }}</h2>
		<a href="/data_centers/create"><span title="Add New Account"><i class="fa fa-plus" aria-hidden="true"></i></span> New Data Center</a>
		<br />
		<table>
			<tr>
				<th class="servtable">ID</th>
				<th class="servtable">Data Center Name</th>
				<th class="servtable">Provider</th>
			</tr>
				@foreach ($data_centers as $data_center)
			<tr>
				<td class="servtable">{{ $data_center->id }}</td>
				{{-- <td class="servtable"><a href="{{ url('data_centers/data_center/'.$data_center->id) }}">{{ $data_center->name }}</a></td> --}}
				<td class="servtable"><a href="/data_centers/data_center/{{ $data_center->id }}">{{ $data_center->name }}</a></td>
				<td class="servtable"><a href="/providers/provider/{{ $data_center->provider_id }}">{{ $data_center->provider->name }}</a></td>
			</tr>
				@endforeach
		</table>
	</div>
</div>
@endsection
