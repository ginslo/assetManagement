@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@endsection

@section('content')

<div class="row">
	<div class="col-sm-9 col-md-4 col-md-offset-3">
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="/registrars/">All Registrars</a>
		<h1><p style="float:right;"><a href="/registrars/registrar/{{ $registrar->id }}/edit"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
		<a target="_blank" href="{{ env('CRM_ACCT_URL')}}{{ $registrar->crm_id }}"><span title="CRM View"><i class="fa fa-eye" aria-hidden="true"></i></span></a></span></p>
		{{ $registrar->name }}</h1>
    <p><span id="leftcol">Details:</span><span id="rightcol"><a href="/registrars/registrar/{{ $registrar->id }}">{{ $registrar->name }}</a></span></p>
  </div>
</div>
<div class="row">
	<div class="col-sm-9 col-md-8 col-md-offset-3">
		<h2>Domain Names at {{ $registrar->name }}</h2>
		<table>
			<tr>
				<th class="servtable">Domain Name</th>
				<th class="servtable">Expiration</th>
				<th class="servtable">Owner</th>
				<th class="servtable">Company</th>
			</tr>
			@foreach($domain_names as $domain_name)
				<tr>
					<td class="servtable"><a href="/domain_names/domain_name/{{ $domain_name->id }}">{{ $domain_name->name }}</a></td>
					<td class="servtable">{{ date('m-d-Y', strtotime($domain_name->expiration_date)) }}</a></td>
					<td class="servtable"><a href="/users/user/{{ $domain_name->user->id }}">{{ $domain_name->user->first_name }} {{ $domain_name->user->last_name }}</a></td>
					<td class="servtable"><a href="/companies/company/{{ $domain_name->user->company->id }}">{{ str_limit($domain_name->user->company->name, $limit=25, $end="...") }}</a></td>
				</tr>
			@endforeach
		</table>
		</div>
	</div>
@endsection
