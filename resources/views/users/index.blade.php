@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')
@endsection

@section('content')
<div class="row">
	<div class="col-sm-10 col-md-offset-2">
		<h2>{{ $title }}</h2>
		<a href="/users/create"><span title="Add New User"><i class="fa fa-plus" aria-hidden="true"></i></span> New User</a>
		<br />
		<table>
			<tr>
				<th class="servtable">ID</th>
				<th class="servtable">E</th>
				<th class="servtable">User Name</th>
				<th class="servtable">Email Address</th>
				<th class="servtable">Company Name</th>
				<th class="servtable">CRM Link</th>
			</tr>
				@foreach ($users as $user)
			<tr>
				<td class="servtable">{{ $user->id }}</td>
				<td class="servtable"><a href="{{ route('users.user.edit', $user->id) }}"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a></td>
				<td class="servtable"><a href="{{ route('users.user.show', $user->id) }}">{{ $user->first_name }} {{ $user->last_name }}</a></td>
				<td class="servtable">{{ $user->email }}</td>
				<td class="servtable"><a href="{{ route('companies.company.show', $user->company->id) }}">{{ str_limit($user->company->name, $limit=25, $end="...") }}</a></td>
				<td class="servtable"><a target="_blank" href="{{ env('CRM_USER_URL') }}{{ $user->crm_id }}">{{ env('CRM_NAME') }}</a></td>
			</tr>
				@endforeach
		</table>
		{{ $users->links() }}
	</div>
</div>
@endsection
