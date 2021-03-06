@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')
@endsection

@section('content')
	@include('common.errors')

  <div class="row">
    <div class="col-sm-8 col-md-offset-4">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/overview">Company Overview</a>
			<h1>{{ $title }}</h1>
			<table>
				<tr>
					<th class="servtable">Name: </th><td class="servtable">{{ $company->name }}</td>
				</table>
    </div>
  </div>

	<div class="row">
		<div class="col-sm-8 col-md-offset-4">
			<h2>Users associated with {{ $company->name }}</h2>
			<table>
				<tr>
					<th class="servtable">Full Name</th>
				</tr>
				@foreach($users as $user)
					<tr>
						<td class="servtable">{{ $user->first_name }} {{ $user->last_name }}</td>
					</tr>
				@endforeach
			</table>
			</div>
		</div>

	</div>

@endsection
