@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@endsection
@section('content')
	@include('common.errors')
	@include('common.messages')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>My Stuff</h2></div>

	                <div class="panel-body">
	                  <h3>My Info</h3>
	                  <table>
	                    <tr>
	                      <th class="servtable">Name</th><td class="servtable">{{ $users->first_name }} {{ $users->last_name }}</td>
											</tr>
											<tr>
	                      <th class="servtable">Email</th><td class="servtable">{{ $users->email }}</td>
											</tr>
											{{-- <tr>
	                      <th class="servtable">Phone</th><td class="servtable">n/a</td>
											</tr>
											<tr>
	                      <th class="servtable">Billing method</th><td class="servtable">n/a</td>
											</tr> --}}
											<tr>
	                      <th class="servtable">Company</th><td class="servtable"><a href="/companies/my_company/{{ $users->company->id }}">{{ $users->company->name }}</a></td>
											</tr>
									</table>

								</div>

                <div class="panel-body">
                  <h3>My Orders</h3>
                  <table>
                    <tr>
                      <th class="servtable">Order ID</th>
											<th class="servtable">Order Date</th>
											<th class="servtable">Memo</th>
										</tr>
										@foreach($invoices as $invoice)
										<tr>
											<td class="servtable"><a href="{{ route('invoices.my_invoice.show', $invoice->id) }}">{{ $invoice->id }}</a></td>
											<td class="servtable">{{ date('m-d-Y', strtotime($invoice->invoice_date)) }}</td>
											<td class="servtable">{{ $invoice->memo }}</td>
											<?php //$ttl = 0; ?>
											{{-- @foreach($invoice_items as $invoice_item) --}}
											<?php //$ttl = $ttl+($invoice_item->quantity * $invoice_item->amount); ?>
											{{-- @endforeach --}}
											{{-- <td class="servtable" align="right">${{ number_format($ttl,2) }}</td> --}}
										</tr>
										@endforeach
									</table>
								</div>

                <div class="panel-body">
                  <h3>My Subscriptions</h3>
									<table>
										<tr>
											{{-- <th class="servtable">ID</th> --}}
											<th class="servtable">Subscription ID</th>
											<th class="servtable">Name</th>
											<th class="servtable">User</th>
											<th class="servtable">Invoice</th>
											{{-- <th class="servtable">Transaction</th> --}}
											<th class="servtable">Start Date</th>
											<th class="servtable">Day of Month</th>
							        <th class="servtable">End Date</th>
							        <th class="servtable">Amount</th>
										</tr>
										@foreach ($subscriptions as $subscription)
											<tr>
												<td class="servtable"><a href="{{ route('subscriptions.my_subscription.show', $subscription->id) }}">{{ $subscription->subscriptionid }}</a></td>
							          <td class="servtable">{{ $subscription->name }}</td>
												<td class="servtable"><a href="{{ route('users.user.show', $subscription->user_id) }}">{{ $subscription->user_id }}</a></td>
												<td class="servtable"><a href="{{ route('invoices.invoice.show', $subscription->invoice_id) }}">{{ $subscription->invoice_id }}</a></td>
												{{-- <td class="servtable"><a href="{{ route('transactions.transaction.show', $subscription->invoice->transaction_id) }}">{{ $subscription->invoice->transaction_id }}</a></td> --}}
												<td class="servtable">{{ $subscription->start_date }}</td>
												<td class="servtable">{{ $subscription->day_of_month }}</td>
							          <td class="servtable">{{ $subscription->end_date }}</td>
							          <td class="servtable" align='right'>${{ $subscription->amount }}</td>
											</tr>
												@endforeach
										</table>
								</div>

								<div class="panel-body">
								<h3>My Transactions</h3>
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
											<td class="servtable"><a href="{{ route('transactions.my_transaction.show', $transaction->id) }}">{{ $transaction->id }}</a></td>
											<td class="servtable">{{ $transaction->transaction_no }}</td>
											<td class="servtable"><a href="{{ route('invoices.my_invoice.show', $transaction->invoice_id) }}">{{ $transaction->invoice_id }}</a></td>
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


                <div class="panel-body">
                  <h3>My Domain Names</h3>
                  <table width="100%">
                    <tr>
                      <th class="servtable">Domain Name</th>
                      <th class="servtable">Registrar</th>
                      <th class="servtable">Manage</th>
                      <th class="servtable">Creation Date</th>
                      <th class="servtable">Expiration Date</th>
                      <th class="servtable">Price/Year</th>
                      <th class="servtable">Auto Renew</th>
                      <th class="servtable">Company</th>
                    <?php $ttl=0; ?>
                    @foreach ($domain_names as $domain_name)
                    <tr>
                      <td class="servtable"><a href="{{ route('domain_names.my_domain_name.show', $domain_name->id) }}">{{ $domain_name->name }}</a></td>
                      <td class="servtable"><a href="{{ route('registrars.registrar_info.show', $domain_name->registrar->id) }}">{{ $domain_name->registrar->name }}</a></td>
											@if($domain_name->DomainNameID != NULL && $domain_name->registrar->id == 1 && Auth::user()->id == 2 )
								        <td class="servtable"><a target="_blank" href="{{ env('ENOM_URL')}}{{ $domain_name->DomainNameID }}">Manage</a></span></td>
											@elseif($domain_name->DomainNameID != NULL && $domain_name->registrar->id == 1 && Auth::user()->id != 2)
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
                      <td class="servtable" align="right"> ${{ number_format( $domain_name->price , 2, '.', '') }}</td>
											<td class="servtable">{{ $domain_name->auto_renew == 1 ? "Auto" : "Off" }}</td>
                      <td class="servtable"><a href="{{ route('companies.my_company.show', $domain_name->user->company->id) }}">{{ $domain_name->user->company->name }}</a></td>
                    </tr>
                    <?php $ttl=$ttl + $domain_name->price; ?>
                    @endforeach
                    <tr>
                      <td class="servtable" align="right" colspan="5">Total:</td>
                      <td class="servtable" align="right">${{ number_format($ttl,2) }}</td>
                      <td class="servtable" align="left"> &nbsp;</td>
                    </tr>
                  </table>
								</div>
								<div class="panel-body">
                  <h3>My Servers</h3>
                  <table width="100%">
              			<tr>
              				<th class="servtable">Name</th>
              				<th class="servtable">Hostname</th>
              				<th class="servtable">IP Address</th>
              				<th class="servtable">Distribution</th>
              				{{-- <th class="servtable">User</th> --}}
              				<th class="servtable">Company</th>
              				<th class="servtable">Provider</th>
              				<th class="servtable">Data Center</th>
              				<th class="servtable">Price/Month</th>
              				<th class="servtable">State</th>
										</tr>
                    <?php $ttl=0; ?>
            				@foreach ($servers as $server)
            				<tr>
            					<td class="servtable"><a href="{{ route('servers.my_server.show', $server->id) }}">{{ $server->name }}</a></td>
            					<td class="servtable"><a href="{{ route('servers.my_server.show', $server->id) }}">{{ $server->hostname }}</a></td>
            					<td class="servtable">{{ $server->ip_public }}</td>
            					<td class="servtable">{{ $server->distribution->name }} {{ $server->version->name }}</td>
            					<td class="servtable"><a href="{{ route('companies.my_company.show', $server->user->company_id) }}">{{ $server->user->company->name }}</a></td>
            					<td class="servtable"><a href="{{ route('providers.provider_info.show', $server->provider->id) }}">{{ $server->provider->name }}</a></td>
            					<td class="servtable"><a href="{{ route('data_centers.data_center_info.show', $server->data_center->id) }}">{{ $server->data_center->name }}</a></td>
            					<td class="servtable" align="right"> ${{ number_format( $server->price , 2, '.', '') }}</td>
            					<td class="servtable"> {{ $serverstate = $server->state == 1 ? "Running" : "Stopped" }}</td>
            				</tr>
                    <?php $ttl=$ttl + $server->price; ?>
            				@endforeach
                    <tr>
                      <td class="servtable" align="right" colspan="7">Total:</td>
                      <td class="servtable" align="right">${{ number_format($ttl,2) }}</td>
                      <td class="servtable" align="left">&nbsp;</td>
                    </tr>
              		</table>
								</div>
								<div class="panel-body">
                  <h3>My Websites</h3>
                  <table width="100%">
              			<tr>
              				<th class="servtable">Website Name</th>
              				<th class="servtable">Full URL</th>
              				<th class="servtable">Application</th>
              				<th class="servtable">Provider</th>
              				<th class="servtable">Data Center</th>
              				<th class="servtable">Server Hostname</th>
              				<th class="servtable">Company</th>
              				<th class="servtable">Tracker</th>
										</tr>
              			@foreach ($websites as $website)
              			<tr>
              				<td class="servtable"><a href="/websites/my_website/{{ $website->id }}">{{ $website->name }}</a></td>
              				<td class="servtable"> <a target="_blank" href="http://{{ $website->subdomain }}.{{ $website->domain_name->name }}">{{ $website->subdomain }}.{{ $website->domain_name->name }}</a></td>
              				<td class="servtable"> <a href="{{ route('products.product_info.show', $website->product->id) }}">{{ $website->product->name }}</a></td>
              				<td class="servtable"> <a href="{{ route('providers.provider_info.show', $website->server->provider->id) }}">{{ $website->server->provider->name }}</a></td>
              				<td class="servtable"> <a href="{{ route('data_centers.data_center_info.show', $website->server->data_center->id) }}">{{ $website->server->data_center->name }}</a></td>
              				<td class="servtable"> <a href="{{ route('servers.my_server.show', $website->server->id) }}">{{ $website->server->hostname }}</a></td>
              				<td class="servtable"> <a href="{{ route('companies.my_company.show', $website->user->company->id) }}">{{ $website->user->company->name }}</a></td>
              				@if($website->bugtracker_name == "")
              					<td class="servtable">&nbsp;</td>
              				@else
              					<td class="servtable"><a target="_blank" href="{{ env('BUGTRACKER_URL') }}/{{ $website->bugtracker_name }}">{{ env("BUGTRACKER_NAME")}}</a></td>
              				@endif
              			</tr>
              			@endforeach
              		</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
