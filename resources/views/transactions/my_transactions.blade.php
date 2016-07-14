@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')
@endsection

@section('content')
  <div class="row">
  	<div class="col-sm-10 col-md-offset-1">
      <i class="fa fa-backward" aria-hidden="true"></i> <a href="{{ route('overview..index') }}">Overview</a>
  		<h2>{{ $title }}</h2>
  		<table>
  			<tr>
  				<th class="servtable">Transaction</th>
  				<th class="servtable">Invoice</th>
  				<th class="servtable">Submit Date</th>
					<th class="servtable">Settlement Date</th>
  				<th class="servtable">User</th>
  				<th class="servtable">Card Type</th>
  				<th class="servtable">Payment Method</th>
          <th class="servtable">Payment Amount</th>
          <th class="servtable">Settlement Amount</th>
					<th class="servtable">Status</th>
          <th class="servtable">Recurring?</th>
          <th class="servtable">Period</th>
          <th class="servtable">Subscription</th>
  			</tr>
  			@foreach ($transactions as $transaction)
				<tr>
          <td class="servtable"><a href="{{ route('transactions.my_transaction.show', $transaction->id) }}">{{ $transaction->transaction_no }}</a></td>
          <td class="servtable"><a href="{{ route('invoices.my_invoice.show', $transaction->invoice_id) }}">{{ $transaction->invoice_id }}</a></td>
          <td class="servtable">{{ $transaction->submit_date }}</td>
					<td class="servtable">{{ $transaction->settlement_date }}</td>
          <td class="servtable"><a href="{{ route('users.user.show', $transaction->user_id) }}">{{ $transaction->user->full_name }}</a></td>
          <td class="servtable">{{ $transaction->card->name }}</td>
          <td class="servtable">{{ $transaction->payment_method }}</td>
          <td class="servtable" align='right'>${{ number_format($transaction->payment_amount,2) }}</td>
          <td class="servtable" align='right'>${{ number_format($transaction->settlement_amount,2) }}</td>
					<td class="servtable">{{ $transaction->transaction_status }}</td>
          <td class="servtable">{{ @$transaction->recurring == 1 ? 'Yes' : 'No' }}</td>
          <td class="servtable">{{ $transaction->period->name }}</td>
          <td class="servtable"><a href="{{ route('subscriptions.my_subscription.show', $transaction->id) }}">{{ $transaction->subscriptionid }}</a></td>
				</tr>
  					@endforeach
  		</table>
      {{ $transactions->links() }}
  	</div>
  </div>
@endsection
