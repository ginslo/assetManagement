@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@endsection

@section('content')

<div class="row">
	<div class="col-sm-9 col-sm-6 col-md-offset-2">
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="/subscriptions/">All subscriptions</a>
    <h2>Subscription Details:<br />{{ $title }}</h2>
		{{-- <h1><p style="float:right;"><a href="{{ route('subscriptions.subscription.edit', $subscription->id) }}"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a></h1> --}}
    {{-- <p class="leftcol">Details: <span class="propbox pull-right">{{ $subscription->name }}</p> --}}
      <table>
        <tr>
          <th class="servtable">Subscription ID:</th>
          <td class="servtable">{{ $subscription->subscriptionid }}&nbsp;<a href="{{ route('subscriptions.subscription.edit', $subscription->id) }}"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true" style="float:right;"></i></span></a></td>
        </tr>
        <tr>
          <th class="servtable">Customer:</th>
          <td class="servtable"><a href="{{ route('users.user.show', $subscription->user_id) }}">{{ $subscription->user->first_name }} {{ $subscription->user->last_name }}</a></td>
        </tr>
        <tr>
          <th class="servtable">Name:</th>
          <td class="servtable">{{ $subscription->name }}</td>
        </tr>
        <tr>
          <th class="servtable">Description:</th>
          <td class="servtable">{{ $subscription->description }}</td>
        </tr>
        <tr>
          <th class="servtable">Invoice ID:</th>
          <td class="servtable"><a href="{{ route('invoices.invoice.show', $subscription->invoice_id) }}">{{ $subscription->invoice_id }}</td>
          </tr>
        <tr>
          <th class="servtable">Start Date:</th>
          <td class="servtable">{{ $subscription->start_date }}</td>
        </tr>
        <tr>
          <th class="servtable">End Date:</th>
          <td class="servtable">{{ $subscription->end_date }}</td>
        </tr>
        <tr>
          <th class="servtable">Card Number:</th>
          <td class="servtable">{{ $subscription->card_number }}</td>
        </tr>
        <tr>
          <th class="servtable">Expiration:</th>
          <td class="servtable">{{ $subscription->card_expiration }}</td>
        </tr>
        <tr>
          <th class="servtable">Amount:</th>
          <td class="servtable">${{ $subscription->amount }}</td>
        </tr>
        <tr>
          <th class="servtable">Period:</th>
          <td class="servtable">{{ $subscription->period->name }}</td>
        </tr>
        <tr>
          <th class="servtable">Day of Month:</th>
          <td class="servtable">{{ $subscription->day_of_month }}</td>
        </tr>
        <tr>
          <th class="servtable">Trial Amount:</th>
          <td class="servtable">${{ $subscription->trial_amount }}</td>
        </tr>
        <tr>
          <th class="servtable">Trial Occurrences:</th>
          <td class="servtable">{{ $subscription->trial_occurrences }}</td>
        </tr>
      </table>
  </div>
</div>

<div class="row">
	<div class="col-sm-9 col-sm-6 col-md-offset-2">
		<h2>Transactions for ID {{ $subscription->subscriptionid }}</h2>
		<table>
			<tr>
        <th class="servtable">Transaction ID</th>
        <th class="servtable">Transaction Date</th>
        <th class="servtable">Settlement Date</th>
				<th class="servtable">Invoice ID</th>
				<th class="servtable">Status</th>
				<th class="servtable">Card</th>
				<th class="servtable">Method</th>
				<th class="servtable">Payment Amount</th>
        <th class="servtable">Settlement Amount</th>
			</tr>
      <?php $ttl=0; ?>
			@foreach($transactions as $transaction)
				<tr>
          <td class="servtable"><a href="{{ route('transactions.transaction.show', $transaction->id) }}">{{ $transaction->transaction_no }}</a></td>
          <td class="servtable">{{ $transaction->submit_date }}</td>
          <td class="servtable">{{ $transaction->settlement_date }}</td>
					<td class="servtable"><a href="{{ route('invoices.invoice.show', $transaction->invoice_id) }}">{{ $transaction->invoice_id }}</td>
					<td class="servtable">{{ $transaction->transaction_status }}</td>
					<td class="servtable">{{ $transaction->card->name }}</td>
					<td class="servtable">{{ $transaction->payment_method }}</td>
					<td class="servtable" align='right'>${{ $transaction->payment_amount }}</td>
          <td class="servtable" align='right'>${{ $transaction->settlement_amount }}</td>
				</tr>
        <?php $ttl=$ttl + $transaction->settlement_amount; ?>
			@endforeach
        <tr>
          <td class="servtable" align='right' colspan="8">Total Paid To Date</td>
          <td class="servtable" align='right'>${{ number_format($ttl,2) }}</td>
        </tr>
		</table>
		</div>
	</div>
@endsection
