@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')

	<div class="row">
		<div class="col-sm-10 col-md-8 col-md-offset-2">
			<i class="fa fa-backward" aria-hidden="true"></i> <a href="/data_centers/data_center/{{ $data_center->id }}">{{ $backtitle }}</a>
			<h1>Editing {{ $data_center->name }}</h1>

			<form action="/data_centers/data_center/{{ $data_center->id }}/update" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
					<label for="provider" class="col-sm-3 control-label">Provider</label>
						<div class="col-sm-6">
							{{ Form::select('provider_id', $providers, $data_center->provider_id, ['class' => 'form-control']) }}
						</div>
				</div>
				<div class="form-group">
					<label for="name" class="col-sm-3 control-label">data_center</label>
						<div class="col-sm-6">
							<input type="text" name="name" id="name" class="form-control" value="{{ $data_center->name }}">
						</div>
				</div>
				<div class="form-group">
	      	<div class="col-sm-offset-3 col-sm-6">
	        	<button type="submit" class="btn btn-success btn-lg btn-block">
	          	<i class="fa fa-btn fa-plus"></i> Update data_center
	          </button>
	        </div>
	      </div>
    	</form>

		</div>
	</div>

@endsection
