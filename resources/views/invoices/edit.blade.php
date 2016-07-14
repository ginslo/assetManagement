@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@endsection
@section('content')
	@include('common.errors')
	<div class="row">
		<div class="col-sm-8 col-md-offset-2">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/invoices/">{{ $backtitle }}</a>
			<h1>{{ $title }}</h1>
			{!! Form::open(array('route' => array('invoices.invoice.update', $invoice->id) )) !!}
      {{ method_field('PATCH') }}
				<div class="form-group">
					{{ Form::label('user_id', 'User ID: ')}}
          <div class="col-sm-6">{{ Form::text('user_id', $invoice->user_id, array('class' => 'form-control')) }}</div>
            {{ Form::label('invoice_date', 'Invoice Date: ')}}
          <div class="col-sm-6">{{ Form::text('invoice_date', $invoice->invoice_date, array('class' => 'form-control')) }}</div>
            {{ Form::label('memo', 'Memo: ')}}
          <div class="col-sm-6">{{ Form::text('memo', $invoice->memo, array('class' => 'form-control')) }}</div>
        </div>
			  <div class="form-group">
				  <div class="col-sm-offset-3 col-sm-6" style="padding:10px 0 0 10px; width:47%;">
					<button type="submit" class="btn btn-success btn-lg btn-block">
						<i class="fa fa-btn fa-plus"></i> Update Invoice
					</button>
			    </div>
			  </div>
		  </div>
		{!! Form::close() !!}
	</div>
</div>
@endsection
