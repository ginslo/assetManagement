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
		<a href="/versions/create"><span title="Add New Distribution Version"><i class="fa fa-plus" aria-hidden="true"></i></span> New Distro Version</a>
		<br />
		<table>
			<tr>
				{{-- <th class="servtable">ID</th> --}}
				<th class="servtable">Distribution</th>
				<th class="servtable">Distribution Version</th>
			</tr>
			@foreach ($versions as $version)
				<tr>
					{{-- <td class="servtable">{{ $version->id }}</td> --}}
					<td class="servtable"><a href="{{ route('distributions.distribution.show', $version->distribution->id) }}">{{ $version->distribution->name }}</a></td>
					<td class="servtable"><a href="{{ route('versions.version.show', $version->id) }}">{{ $version->name }}</a></td>
				</tr>
					@endforeach
			</table>
	</div>
</div>
@endsection
