@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')

<div class="row">
	<div class="col-sm-12 col-md-12">
    <h2>Blog Page</h2>
    <p>
      {{ $websiteid }} {{$year}} {{$month}} {{$day}} {{ $website->name }}
    </p>
  </div>
</div>
@endsection
