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
		<a href="/providers/create"><span title="Add New provider"><i class="fa fa-plus" aria-hidden="true"></i></span> New Provider</a>
		<br />
		<table>
			<tr>
				<th class="servtable">ID</th>
				<th class="servtable">Company Name</th>
			</tr>
				@foreach ($providers as $provider)
			<tr>
				<td class="servtable">{{ $provider->id }}</td>
				<td class="servtable"><a href="{{ route('providers.provider.show', $provider->id) }}">{{ $provider->name }}</a></td>
			</tr>
				@endforeach
		</table>
	</div>
</div>
@endsection
