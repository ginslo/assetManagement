@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')
@endsection

@section('content')

  <div class="row">
    <div class="col-sm-10 col-md-8 col-md-offset-2">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/users/">All Users</a>
			<h1><p style="float:right;"><a href="{{ route('users.user.edit', $user->id) }}"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
			<a target="_blank" href="{{ env('CRM_USER_URL')}}{{ $user->crm_id }}"><span title="CRM View"><i class="fa fa-eye" aria-hidden="true"></i></span></a></span></p>
			{{ $title }}</h1>
        <p class="leftcol">Name: <span class="propbox pull-right">{{ $user->first_name }} {{ $user->last_name }}</p>
        <p class="leftcol">Email: <span class="propbox pull-right">{{ $user->email }}</span></p>
        <p class="leftcol">Company: <span class="propbox pull-right"><a href="/companies/company/{{ $user->company_id }}">{{ $user->company->name }}</a></span></p>
        <p class="leftcol">Admin Status: <span class="propbox pull-right">{{ $isadmin }}</span></p>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-10 col-md-8 col-md-offset-2">
			<h2>Invoices</h2>
			<table>
				<tr>
					<th class="servtable">Order ID</th>
					<th class="servtable">Order Date</th>
				</tr>
				@foreach($invoices as $invoice)
				<tr>
					<td class="servtable"><a href="{{ route('invoices.invoice.show', $invoice->id) }}">{{ $invoice->id }}</a></td>
					<td class="servtable">{{ date('m-d-Y', strtotime($invoice->invoice_date)) }}</td>
					<?php //$ttl = 0; ?>
					{{-- @foreach($invoice_items as $invoice_item) --}}
					<?php //$ttl = $ttl+($invoice_item->quantity * $invoice_item->amount); ?>
					{{-- @endforeach --}}
					{{-- <td class="servtable" align="right">${{ number_format($ttl,2) }}</td> --}}
				</tr>
				@endforeach
			</table>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-10 col-md-8 col-md-offset-2">
			<h2>Transactions</h2>
			<table>
				<tr>
					<th class="servtable">Transaction ID</th>
					<th class="servtable">Transaction No</th>
					<th class="servtable">Invoice ID</th>
					<th class="servtable">Transaction Date</th>
					<th class="servtable">Settlement Date</th>
					<th class="servtable">Payment Amount</th>
					<th class="servtable">Settlement Amount</th>
				</tr>
				@foreach($transactions as $transaction)
				<tr>
					<td class="servtable"><a href="{{ route('transactions.transaction.show', $transaction->id) }}">{{ $transaction->id }}</a></td>
					<td class="servtable">{{ $transaction->transaction_no }}</td>
					<td class="servtable"><a href="{{ route('invoices.invoice.show', $transaction->invoice_id) }}">{{ $transaction->invoice_id }}</a></td>
					<td class="servtable">{{ date('m-d-Y', strtotime($transaction->submit_date)) }}</td>
					<td class="servtable">{{ date('m-d-Y', strtotime($transaction->settlement_date)) }}</td>
					<td class="servtable" align="right">${{ number_format($transaction->payment_amount,2) }}</td>
					<td class="servtable" align="right">${{ number_format($transaction->settlement_amount,2) }}</td>
					<?php //$ttl = 0; ?>
					{{-- @foreach($invoice_items as $invoice_item) --}}
					<?php //$ttl = $ttl+($invoice_item->quantity * $invoice_item->amount); ?>
					{{-- @endforeach --}}
					{{-- <td class="servtable" align="right">${{ number_format($ttl,2) }}</td> --}}
				</tr>
				@endforeach
			</table>
    </div>
  </div>



	<div class="row">
		<div class="col-sm-10 col-md-8 col-md-offset-2">
			<h2>Associated Servers</h2>
			<table>
				<tr>
					<th class="servtable">Name</th>
					<th class="servtable">Hostname</th>
					<th class="servtable">Distribution</th>
					<th class="servtable">Provider</th>
					<th class="servtable">DC</th>
					<th class="servtable">Cost/Month</th>
					<th class="servtable">Price/Month</th>
				</tr>
				<?php $cttl=0; ?>
				<?php $pttl=0; ?>
				@foreach($servers as $server)
					<tr>
						<td class="servtable"><a href="{{ route('servers.server.show', $server->id) }}">{{ $server->name }}</a></li>
						<td class="servtable"><a href="{{ route('servers.server.show', $server->id) }}">{{ $server->hostname }}</a></li>
						<td class="servtable"><a href="{{ route('distributions.distribution.show', $server->distribution->id) }}">{{ $server->distribution->name }} {{ $server->version->name }}</a></li>
						<td class="servtable"><a href="{{ route('providers.provider.show', $server->provider->id) }}">{{$server->provider->name}}</a></li>
						<td class="servtable"><a href="{{ route('data_centers.data_center.show', $server->data_center->id) }}">{{ $server->data_center->name }}</a></li>
						<td class="servtable" align="right">${{ number_format($server->cost,2) }}</li>
						<td class="servtable" align="right">${{ number_format($server->price,2) }}</li>
					</tr>
					<?php $cttl=$cttl + $server->cost; ?>
					<?php $pttl=$pttl + $server->price; ?>
				@endforeach
				@if($cttl>0)
					<tr>
						<td class="servtable" align="right" colspan="5">Totals:</td>
						<td class="servtable" align="right">${{ number_format($cttl,2) }}</td>
						<td class="servtable" align="right">${{ number_format($pttl,2) }}</td>
					</tr>
				@endif
			</table>
			<br /><br />
		</div>
	</div>
	<div class="row">
		<div class="col-sm-10 col-md-8 col-md-offset-2">
			<h2>Associated Websites</h2>
			<table>
				<tr>
					<th class="servtable">Name</th>
					<th class="servtable">URL</th>
					<th class="servtable">Application</th>
					<th class="servtable">Server</th>
					<th class="servtable">Hostname</th>
				</tr>
				@foreach($websites as $website)
					<tr>
					<td class="servtable"><a href="/websites/website/{{ $website->id }}">{{ $website->name }}</a></td>
					<td class="servtable"><a target="_blank" href="http://{{ $website->subdomain }}.{{ $website->domain_name->name }}">{{ $website->subdomain }}.{{ $website->domain_name->name }}</a></td>
					<td class="servtable"><a href="{{ route('products.product.show', $website->product->id) }}">{{ $website->product->name }}</a></td>
					<td class="servtable"><a href="{{ route('servers.server.show', $website->server->id) }}">{{ $website->server->name }}</a></td>
					<td class="servtable"><a href="{{ route('servers.server.show', $website->server->id) }}">{{ $website->server->hostname }}</a></td>
				</tr>
				@endforeach
			</table>
			<br /><br />
		</div>
	</div>
	<div class="row">
		<div class="col-sm-10 col-md-8 col-md-offset-2">
			<h2>Associated Domain Names</h2>
			<table width="100%">
				<tr>
					<th class="servtable">Domain Name</th>
					<th class="servtable">Registrar</th>
					<th class="servtable">Manage</th>
					<th class="servtable">Creation Date</th>
					<th class="servtable">Expiration Date</th>
					<th class="servtable">Cost/Year</th>
					<th class="servtable">Price/Year</th>
					<th class="servtable">Company</th>
				<?php $cttl=0; ?>
				<?php $pttl=0; ?>
				@foreach ($domain_names as $domain_name)
				<tr>
					<td class="servtable"><a href="{{ route('domain_names.domain_name.show', $domain_name->id) }}">{{ $domain_name->name }}</a></td>
					<td class="servtable"><a href="{{ route('registrars.registrar.show', $domain_name->registrar->id) }}">{{ $domain_name->registrar->name }}</a></td>

					@if($domain_name->DomainNameID != NULL && $domain_name->registrar->id == 1 && $domain_name->user_id == 2 )
						<td class="servtable"><a target="_blank" href="{{ env('ENOM_URL')}}{{ $domain_name->DomainNameID }}">Manage</a></span></td>
					@elseif($domain_name->DomainNameID != NULL && $domain_name->registrar->id == 1 && $domain_name->user_id != 2)
						<td class="servtable"><a target="_blank" href="{{ env('ENOMCENTRAL_URL')}}{{ $domain_name->DomainNameID }}">Manage</a></span></td>
					@elseif($domain_name->registrar->id == 2)
						<td class="servtable"><a target="_blank" href="{{ env('GOOGLEDOMAIN_URL')}}">Manage</a></span></td>
					@elseif($domain_name->registrar->id == 3)
						<td class="servtable"><a target="_blank" href="{{ env('GODADDY_URL')}}">Manage</a></span></td>
					@else
						<td class="servtable"><a target="_blank" href="#">&nbsp;</a></span></td>
					@endif

					<td class="servtable">{{ date('m-d-Y', strtotime($domain_name->creation_date)) }}</td>
					<td class="servtable">{{ date('m-d-Y', strtotime($domain_name->expiration_date)) }}</td>
					<td class="servtable" align="right"> ${{ number_format( $domain_name->cost , 2, '.', '') }}</td>
					<td class="servtable" align="right"> ${{ number_format( $domain_name->price , 2, '.', '') }}</td>
					<td class="servtable"><a href="{{ route('companies.company.show', $domain_name->user->company->id) }}">{{ $domain_name->user->company->name }}</a></td>
				</tr>
				<?php $cttl=$cttl + $domain_name->cost; ?>
				<?php $pttl=$pttl + $domain_name->price; ?>
				@endforeach
				@if($cttl>0)
					<tr>
						<td class="servtable" align="right" colspan="5">Total:</td>
						<td class="servtable" align="right">${{ number_format($cttl,2) }}</td>
						<td class="servtable" align="right">${{ number_format($pttl,2) }}</td>
						<td class="servtable" align="left"> &nbsp;</td>
					</tr>
				@endif
			</table>

		</div>
	</div>
	<br /><br />
@endsection
