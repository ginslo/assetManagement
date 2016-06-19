@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')
<div class="row">
	<div class="col-sm-12 col-md-6">
		<h2>{{ $title }}</h2>
		<a href="/purposes/create"><span title="Add New purpose"><i class="fa fa-plus" aria-hidden="true"></i></span> New Purpose</a>
		<br />
		<table>
			<tr>
				<th class="servtable">ID</th>
				<th class="servtable">Purpose</th>
			</tr>
			@foreach ($purposes as $purpose)
				<tr>
					<td class="servtable">{{ $purpose->id }}</td>
					<td class="servtable"><a href="/purposes/purpose/{{ $purpose->id }}">{{ $purpose->name }}</a></td>
				</tr>
					@endforeach
			</table>
	</div>
</div>
@endsection
