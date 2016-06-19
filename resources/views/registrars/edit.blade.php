@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')

  <div class="row">
    <div class="col-sm-12 col-md-6">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/registrars/registrar/{{ $registrar->id }}">{{ $backtitle }}</a>
      <h1>Editing {{ $registrar->name }}</h1>
        {{-- <p class="leftcol">Name: <span class="propbox pull-right">{{ $registrar->name }}</span></p> --}}
    </div>
  </div>

	<div class="row">
		<div class="col-sm-12 col-md-6">

			<form action="/registrars/registrar/{{ $registrar->id }}/update" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
					<label for="name" class="col-sm-3 control-label">registrar</label>
						<div class="col-sm-6">
							<input type="text" name="name" id="name" class="form-control" value="{{ $registrar->name }}">
						</div>
					<label for="crm_id" class="col-sm-3 control-label">CRM ID</label>
						<div class="col-sm-6">
							<input type="text" name="crm_id" id="crm_id" class="form-control" value="{{ $registrar->crm_id }}">
						</div>
				</div>
				<div class="form-group">
	      	<div class="col-sm-offset-3 col-sm-6">
	        	<button type="submit" class="btn btn-default">
	          	<i class="fa fa-btn fa-plus"></i> Update registrar
	          </button>
	        </div>
	      </div>
    	</form>

		</div>
	</div>

@endsection
