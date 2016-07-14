@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@endsection

@section('content')

<div class="row">
	<div class="col-sm-9 col-sm-6 col-md-offset-4">
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="{{ route('subscriptions.my_subscriptions.index') }}">All Subscriptions</a>
    <h2>{{ $title }} {{ $subscription->subscriptionid }}</h2>

    <table>
      <tr>
        <th class="servtable">Subscription ID:</th>
        <td class="servtable">{{ $subscription->subscriptionid }}</td>
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
        <td class="servtable"><a href="{{ route('invoices.my_invoice.show', $subscription->invoice_id) }}">{{ $subscription->invoice_id }}</td>
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


@endsection
