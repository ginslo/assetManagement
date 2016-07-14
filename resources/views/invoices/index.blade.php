@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')
@endsection

@section('content')
  <div class="row">
  	<div class="col-sm-10 col-md-offset-3">
  		<h2>{{ $title }}</h2>
  		<a href="/invoices/create"><span title="Add New Invoice"><i class="fa fa-plus" aria-hidden="true"></i></span>New Invoice</a>
  		<br />
			<br />
  		<table>
  			<tr>
  				<th class="servtable">Invoice</th>
  				<th class="servtable">User</th>
  				<th class="servtable">Memo</th>
  				<th class="servtable">Amount</th>
				</tr>
				@foreach ($invoices as $invoice)
				<tr>
          <td class="servtable"><a href="{{ route('invoices.invoice.show', $invoice->id) }}">{{ $invoice->id }}</a></td>
          <td class="servtable"><a href="{{ route('users.user.show', $invoice->user_id) }}">({{ $invoice->user_id }}) {{ $invoice->user->full_name }}</a></td>
          <td class="servtable">{{ $invoice->memo }}</td>
          <td class="servtable">{{ $invoice->amount }}</td>
				</tr>
						@endforeach
			</table>
			{{ $invoices->links() }}
  	</div>
  </div>
@endsection
