@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')

  <div class="row">
    <div class="col-sm-12 col-md-6">
        {{-- <p class="leftcol">Name: <span class="propbox pull-right">{{ $account->name }}</span></p> --}}
    </div>
  </div>

	<div class="row">
		<div class="col-sm-10 col-md-8 col-md-offset-2">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/accounts/account/{{ $account->id }}">{{ $backtitle }}</a>
			<h1>Editing {{ $account->name }}</h1>

			<form action="/accounts/account/{{ $account->id }}/update" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
					<label for="name" class="col-sm-3 control-label">Account</label>
						<div class="col-sm-6">
							<input type="text" name="name" id="name" class="form-control" value="{{ $account->name }}">
						</div>
					<label for="crm_id" class="col-sm-3 control-label">CRM ID</label>
						<div class="col-sm-6">
							<input type="text" name="crm_id" id="crm_id" class="form-control" value="{{ $account->crm_id }}">
						</div>
				</div>
				<div class="form-group">
	      	<div class="col-sm-offset-3 col-sm-6">
	        	<button type="submit" class="btn btn-success btn-lg btn-block">
	          	<i class="fa fa-btn fa-plus"></i> Update Account
	          </button>
	        </div>
	      </div>
    	</form>

		</div>
	</div>

@endsection
