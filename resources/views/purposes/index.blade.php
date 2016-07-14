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
					<td class="servtable"><a href="{{ route('purposes.purpose.show', $purpose->id) }}">{{ $purpose->name }}</a></td>
				</tr>
					@endforeach
			</table>
	</div>
</div>
@endsection
