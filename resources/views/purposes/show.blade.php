@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@endsection

@section('content')

<div class="row">
	<div class="col-sm-9 col-md-4 col-md-offset-3">
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="/purposes/">All Purposes</a>
		<h1><p style="float:right;"><a href="{{ route('purposes.purpose.edit', $purpose->id) }}"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a></p>
		{{ $purpose->name }}</h1>
    <p><span id="leftcol">Details:</span><span id="rightcol"><a href="{{ route('purposes.purpose.show', $purpose->id) }}">{{ $purpose->name }}</a></span></p>
  </div>
</div>
@stop
