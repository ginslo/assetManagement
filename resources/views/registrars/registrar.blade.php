@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')

@section('content')

<div class="row">
	<div class="col-sm-12 col-md-6">
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="/registrars/">All Registrars</a>
		<h1><p style="float:right;"><a href="/registrars/registrar/{{ $registrar->id }}/edit"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
		<a target="_blank" href="{{ env('CRM_ACCT_URL')}}{{ $registrar->crm_id }}"><span title="CRM View"><i class="fa fa-eye" aria-hidden="true"></i></span></a></span></p>
		{{ $registrar->name }}</h1>
    <p><span id="leftcol">Details:</span><span id="rightcol"><a href="/registrars/registrar/{{ $registrar->id }}">{{ $registrar->name }}</a></span></p>
  </div>
</div>
<div class="row">
	<div class="col-sm-12 col-md-6">
		<h2>Domain Names at {{ $registrar->name }}</h2>
		<table>
			<tr>
				<th class="servtable">Domain Name</th>
			</tr>
			@foreach($domain_names as $domain_name)
				<tr>
					<td class="servtable"><a href="/domain_names/domain_name/{{ $domain_name->id }}">{{ $domain_name->name }}</a></td>
				</tr>
			@endforeach
		</table>
		</div>
	</div>
@endsection
