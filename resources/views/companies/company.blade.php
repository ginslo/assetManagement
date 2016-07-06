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
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/companies/">{{ $backtitle }}</a>
			<h1>{{ $title }}</h1>
			<table>
				<tr>
					<th class="servtable"><a href="/companies/company/{{ $company->id }}/edit"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a> |
					<a target="_blank" href="{{ env('CRM_ACCT_URL')}}{{ $company->crm_id }}"><span title="CRM View"><i class="fa fa-eye" aria-hidden="true"></i></span></a></span> |
					Name: </th><td class="servtable">{{ $company->name }}</td>
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
						<td class="servtable"><a href="/users/user/{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</a></td>
					</tr>
				@endforeach
			</table>
			</div>
		</div>
	{{-- <div class="row">
		<div class="col-sm-8 col-md-offset-4">
			<h2>Websites associated with {{ $company->name }}</h2>
			<table>
				<tr>
					<th class="servtable">Website</th>
				</tr>
				@foreach($websites as $website)
					<tr>
						<td class="servtable"><a href="/websites/website/{{ $website->id }}">{{ $website->id }} {{ $website->name }}</a></td>
					</tr>
				@endforeach
			</table>
			</div>
		</div> --}}

	</div>

@endsection
