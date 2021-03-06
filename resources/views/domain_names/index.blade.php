@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')
@endsection

@section('content')
<div class="row">
	<div class="col-sm-10 col-md-offset-1">
		<h2>{{ $title }}</h2>
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="/domain_names/">All Domain Names</a>
		<br />
		<a href="/domain_names/create"><span title="Add New domain_name"><i class="fa fa-plus" aria-hidden="true"></i></span> New Domain Name</a>
		<br />
		<table width="100%">
			<tr>
				<th class="servtable">ID</th>
				<th class="servtable">E</th>
				<th class="servtable">Domain Name</th>
				<th class="servtable">Registrar</th>
				<th class="servtable">Creation Date</th>
				<th class="servtable">Expiration Date</th>
				<th class="servtable">Cost</th>
				<th class="servtable">Price</th>
				<th class="servtable">Auto Renew</th>
				<th class="servtable">User</th>
				<th class="servtable">Company</th>
				<th class="servtable">Manage</th>
			@foreach ($domain_names as $domain_name)
			<tr>
				<td class="servtable">{{ $domain_name->id }}</td>
				<td class="servtable"><a href="{{ route('domain_names.domain_name.edit', $domain_name->id) }}"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a></td>
				<td class="servtable"><a href="{{ route('domain_names.domain_name.show', $domain_name->id) }}">{{ $domain_name->name }}</a></td>
				<td class="servtable"><a href="{{ route('registrars.registrar.show', $domain_name->registrar->id) }}">{{ $domain_name->registrar->name }}</a></td>
				<td class="servtable">{{ date('m-d-Y', strtotime($domain_name->creation_date)) }}</td>
				<td class="servtable">{{ date('m-d-Y', strtotime($domain_name->expiration_date)) }}</td>
				<td class="servtable" align="right">${{ number_format( $domain_name->cost , 2, '.', '') }}</td>
				<td class="servtable" align="right">${{ number_format( $domain_name->price , 2, '.', '') }}</td>
				<td class="servtable">{{ $domain_name->auto_renew == 1 ? "Auto" : "Off" }}</td>
				<td class="servtable"><a href="{{ route('users.user.show', $domain_name->user->id) }}">{{ $domain_name->user->first_name }} {{ $domain_name->user->last_name }}</a></td>
				<td class="servtable"><a href="{{ route('companies.company.show', $domain_name->user->company->id) }}">{{ str_limit($domain_name->user->company->name, $limit=21, $end="...") }}</a></td>
				<td class="servtable"><a href="{{ route('registrars.registrar.show', $domain_name->registrar->id) }}">{{ $domain_name->registrar->name }}</a></td>
			</tr>
			@endforeach
		</table>
		{{ $domain_names->links() }}
	</div>
</div>
@endsection
