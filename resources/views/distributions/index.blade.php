@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')
<div class="row">
	<div class="col-sm-8 col-md-offset-4">
		<h2>{{ $title }}</h2>
		<a href="/distributions/create"><span title="Add New OS"><i class="fa fa-plus" aria-hidden="true"></i></span> New OS</a>
		<br />
		<table>
			<tr>
				<th class="servtable">ID</th>
				<th class="servtable">OS</th>
			</tr>
			@foreach ($distributions as $distribution)
				<tr>
					<td class="servtable">{{ $distribution->id }}</td>
					<td class="servtable"><a href="/distributions/distribution/{{ $distribution->id }}">{{ $distribution->name }}</a></td>
				</tr>
					@endforeach
			</table>
	</div>
</div>
@endsection
