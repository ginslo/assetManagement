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
		<a href="/applications/create"><span title="Add New Application"><i class="fa fa-plus" aria-hidden="true"></i></span> New Application</a>
		<br />
		<table>
			<tr>
				<th class="servtable">Application Name</th>
				<th class="servtable">Slug</th>
				<th class="servtable">Source</th>
      </tr>
				@foreach ($applications as $application)
			<tr>
				<td class="servtable"><a href="/applications/application/{{ $application->id }}">{{ $application->name }}</a></td>
				<td class="servtable"><a href="/applications/application/{{ $application->id }}">{{ $application->slug }}</a></td>
				<td class="servtable"><a target="_blank" href="{{ $application->source_url }}">{{ $application->source_url }}</a></td>
			</tr>
				@endforeach
		</table>
		{{ $applications->links() }}
	</div>
</div>
@endsection
