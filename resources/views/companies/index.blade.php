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
		<a href="/companies/create"><span title="Add New Company"><i class="fa fa-plus" aria-hidden="true"></i></span> New Company</a>
		<br />
		<table>
			<tr>
				<th class="servtable">ID</th>
				<th class="servtable">Company Name</th>
			</tr>
				@foreach ($companies as $company)
			<tr>
				<td class="servtable">{{ $company->id }}</td>
				<td class="servtable"><a href="{{ route('companies.company.show', $company->id) }}">{{ $company->name }}</a></td>
			</tr>
				@endforeach
		</table>
		{{ $companies->links() }}
	</div>
</div>
@endsection
