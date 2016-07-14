@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')
@endsection

@section('content')
<div class="row">
	<div class="col-sm-8 col-md-offset-4">
		<h2>{{ $title }}</h2>
		<a href="/data_centers/create"><span title="Add New Company"><i class="fa fa-plus" aria-hidden="true"></i></span> New Data Center</a>
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
				<td class="servtable"><a href="{{ route('data_centers.data_center.show', $data_center->id) }}">{{ $data_center->name }}</a></td>
				<td class="servtable"><a href="{{ route('providers.provider.show', $data_center->provider_id) }}">{{ $data_center->provider->name }}</a></td>
			</tr>
				@endforeach
		</table>
	</div>
</div>
@endsection
