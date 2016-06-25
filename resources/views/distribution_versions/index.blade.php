@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')
<div class="row">
	<div class="col-sm-8 col-md-offset-4">
		<h2>{{ $title }}</h2>
		<a href="/distribution_versions/create"><span title="Add New Distribution Version"><i class="fa fa-plus" aria-hidden="true"></i></span> New Distro Version</a>
		<br />
		<table>
			<tr>
				{{-- <th class="servtable">ID</th> --}}
				<th class="servtable">Distribution</th>
				<th class="servtable">Distribution Version</th>
			</tr>
			@foreach ($distribution_versions as $distribution_version)
				<tr>
					{{-- <td class="servtable">{{ $distribution_version->id }}</td> --}}
					<td class="servtable"><a href="/distributions/distribution/{{ $distribution_version->distribution->id }}">{{ $distribution_version->distribution->name }}</a></td>
					<td class="servtable"><a href="/distribution_versions/distribution_version/{{ $distribution_version->id }}">{{ $distribution_version->name }}</a></td>
				</tr>
					@endforeach
			</table>
	</div>
</div>
@endsection
