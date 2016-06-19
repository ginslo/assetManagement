@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')
<div class="row">
	<div class="col-sm-12 col-md-12">
		<h2>{{ $title }}</h2>
		<a href="/accounts/create"><span title="Add New Account"><i class="fa fa-plus" aria-hidden="true"></i></span> New Account</a>
		<br />
		<table>
			<tr>
				<th class="servtable">ID</th>
				<th class="servtable">Account Name</th>
			</tr>
				@foreach ($accounts as $account)
			<tr>
				<td class="servtable">{{ $account->id }}</td>
				<td class="servtable"><a href="/accounts/account/{{ $account->id }}">{{ $account->name }}</a></td>
			</tr>
				@endforeach
		</table>
		{{ $accounts->links() }}
	</div>
</div>
@endsection
