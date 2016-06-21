@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')

@section('content')

<div class="row">
	<div class="col-sm-9 col-md-4 col-md-offset-3">
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="/os_versions/">All os_versions</a>
		<h1><p style="float:right;"><a href="/os_versions/os_version/{{ $os_version->id }}/edit"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
		</p>{{ $os_version->name }}</h1>
    <p class="leftcol">Details: <span class="propbox pull-right">{{ $os_version->name }}</p>
  </div>
</div>

@endsection
