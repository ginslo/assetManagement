@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@endsection

@section('content')

<div class="row">
	<div class="col-sm-9 col-sm-6 col-md-offset-2">
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="/overview/">Overview</a>
    <h2>{{ $title }}</h2>

      <table>
				<tr>
					<th class="servtable">Invoice ID:</th>
					<td class="servtable">{{ $invoice->id }}</td>
					</tr>
					<tr>
        <tr>
          <th class="servtable">Customer:</th>
          <td class="servtable"><a href="{{ route('users.user.show', $invoice->user_id) }}">{{ $invoice->user->first_name }} {{ $invoice->user->last_name }}</a></td>
        </tr>
				<tr>
					<th class="servtable">Memo:</th>
					<td class="servtable">{{ $invoice->memo }}</td>
				</tr>
      </table>
  </div>
</div>
<div class="row">
	<div class="col-sm-9 col-sm-8 col-md-offset-2">
		<h2>Items</h2>
      <table>
				<tr>
					<th class="servtable">Item ID</th>
					<th class="servtable">Item</th>
					<th class="servtable">Quantity</th>
					<th class="servtable">Unit</th>
					<th class="servtable">Price</th>
          <th class="servtable">Taxable</th>
					<th class="servtable">Amount</th>
					<th class="servtable">Recurring?</th>
				</tr>
				<tr>
          <?php $ttl = 0; ?>
					@foreach($invoice_items as $invoice_item)
					<td class="servtable"><a href="{{ route('products.product.show', $invoice_item->product->slug) }}">{{ $invoice_item->product_id }}</a></td>
					<td class="servtable">{{ $invoice_item->product->name }}<br />{{ $invoice_item->memo }}</td>
					<td class="servtable">{{ $invoice_item->quantity }}</td>
					<td class="servtable">each</td>
					<td class="servtable" align="right">${{ $invoice_item->amount }}</td>
          <td class="servtable">{{ @$invoice_item->taxable == 0 ? 'No' : 'Yes' }}</td>
					<td class="servtable" align="right">${!! number_format(@$invoice_item->quantity * $invoice_item->amount, 2) !!}</td>
					@if($invoice_item->product->recurring == 0)
						<td class="servtable">No</td>
					@else
						<td class="servtable">Yes {{	$invoice_item->product->period->name }}</td>
					@endif
						<?php $ttl = $ttl+($invoice_item->quantity * $invoice_item->amount); ?>
					@endforeach
        </tr>
        <tr>
          <td colspan = "6" class="servtable" align="right">Total: </td>
          <td class="servtable" align="right">${{ number_format($ttl,2) }}</td>
          <td class="servtable" align="right">&nbsp;</td>
        </tr>
      </table>
  </div>
</div>
<div class="row">
	<div class="col-sm-9 col-sm-8 col-md-offset-1">

		<h2>Transactions for Invoice {{ $invoice->id }}</h2>

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
				<td class="servtable">{{ $transaction->invoice_id }}</td>
				<td class="servtable">{{ $transaction->submit_date }}</td>
				<td class="servtable">{{ $transaction->settlement_date }}</td>
				<td class="servtable">{{ $transaction->user->full_name }}</td>
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
		{{-- {{ $transactions->links() }} --}}






	</div>
</div>
@endsection
