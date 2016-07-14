@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@endsection

@section('content')

<div class="row">
	<div class="col-sm-9 col-sm-6 col-md-offset-4">
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="/transactions/">All transactions</a>
    <h2>{{ $title }}</h2>

      <table>
        <tr>
          <th class="servtable">Transaction No:</th>
          <td class="servtable">{{ $transaction->transaction_no }}&nbsp;<a href="{{ route('transactions.transaction.edit', $transaction->id) }}"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true" style="float:right;"></i></span></a></td>
        </tr>
				<tr>
					<th class="servtable">Invoice ID:</th>
					<td class="servtable"><a href="{{ route('invoices.invoice.show', $transaction->invoice_id) }}">{{ $transaction->invoice_id }}</td>
					</tr>
					<tr>
        <tr>
          <th class="servtable">Customer:</th>
          <td class="servtable"><a href="{{ route('users.user.show', $transaction->user_id) }}">{{ $transaction->user->first_name }} {{ $transaction->user->last_name }}</a></td>
        </tr>
        <tr>
          <th class="servtable">Status:</th>
          <td class="servtable">{{ $transaction->transaction_status }}</td>
        </tr>
				<tr>
					<th class="servtable">Card ID:</th>
					<td class="servtable">{{ $transaction->card->name }}</td>
				</tr>
				<tr>
					<th class="servtable">Payment Method:</th>
					<td class="servtable">{{ $transaction->payment_method }}</td>
				</tr>
          <th class="servtable">Submit Date:</th>
          <td class="servtable">{{ $transaction->submit_date }}</td>
        </tr>
        <tr>
          <th class="servtable">Settlement Date:</th>
          <td class="servtable">{{ $transaction->settlement_date }}</td>
        </tr>
        <tr>
          <th class="servtable">Payment Amount:</th>
          <td class="servtable">${{ $transaction->payment_amount }}</td>
        </tr>
        <tr>
          <th class="servtable">Settlement Amount:</th>
          <td class="servtable">${{ $transaction->settlement_amount }}</td>
        </tr>
        <tr>
          <th class="servtable">Recurring?:</th>
          <td class="servtable">{{ @$transaction->recurring == 1 ? 'Yes' : 'No'  }}</td>
        </tr>
				@if($transaction->recurring == 1 )
				<tr>
					<th class="servtable">Period:</th>
					<td class="servtable">{{ $transaction->period->name }}</td>
				</tr>
        <tr>
          <th class="servtable">Subscription ID:</th>
          <td class="servtable">{{ $transaction->subscriptionid }}</td>
        </tr>
				@endif
      </table>
  </div>
</div>


@endsection
