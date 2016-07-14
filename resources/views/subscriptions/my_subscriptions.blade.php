@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')
@endsection

@section('content')
<div class="row">
	<div class="col-sm-8 col-md-offset-2">
    <i class="fa fa-backward" aria-hidden="true"></i> <a href="{{ route('overview..index') }}">Overview</a>
    <br />
		<h2>{{ $title }}</h2>
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
					<td class="servtable">{{ $subscription->user->full_name }}</td>
					<td class="servtable"><a href="{{ route('invoices.my_invoice.show', $subscription->invoice_id) }}">{{ $subscription->invoice_id }}</a></td>
					{{-- <td class="servtable"><a href="{{ route('transactions.transaction.show', $subscription->invoice->transaction_id) }}">{{ $subscription->invoice->transaction_id }}</a></td> --}}
					<td class="servtable">{{ $subscription->start_date }}</td>
					<td class="servtable">{{ $subscription->day_of_month }}</td>
          <td class="servtable">{{ $subscription->end_date }}</td>
          <td class="servtable" align='right'>${{ $subscription->amount }}</td>
				</tr>
					@endforeach
			</table>
	</div>
</div>
@endsection
