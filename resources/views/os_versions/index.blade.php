@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')
<div class="row">
	<div class="col-sm-12 col-md-6">
		<h2>{{ $title }}</h2>
		<a href="/os_versions/create"><span title="Add New OS Version"><i class="fa fa-plus" aria-hidden="true"></i></span> New OS Version</a>
		<br />
		<table>
			<tr>
				<th class="servtable">ID</th>
				<th class="servtable">OS</th>
			</tr>
			@foreach ($os_versions as $os_version)
				<tr>
					<td class="servtable">{{ $os_version->id }}</td>
					<td class="servtable"><a href="/os_versions/os_version/{{ $os_version->id }}">{{ $os_version->name }}</a></td>
				</tr>
					@endforeach
			</table>
	</div>
</div>
@endsection
