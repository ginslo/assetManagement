@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')
<div class="row">
	<div class="col-sm-12 col-md-6">
		<h2>{{ $title }}</h2>
		<a href="/oss/create"><span title="Add New OS"><i class="fa fa-plus" aria-hidden="true"></i></span> New OS</a>
		<br />
		<table>
			<tr>
				<th class="servtable">ID</th>
				<th class="servtable">OS</th>
			</tr>
			@foreach ($oss as $os)
				<tr>
					<td class="servtable">{{ $os->id }}</td>
					<td class="servtable"><a href="/oss/os/{{ $os->id }}">{{ $os->name }}</a></td>
				</tr>
					@endforeach
			</table>
	</div>
</div>
@endsection