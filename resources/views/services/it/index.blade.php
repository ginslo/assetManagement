@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@endsection

@section('content')
  <div class="row">

    @if($service=='Not Found')
      hello IT top level
    @endif

    @foreach($services as $service)
    {{-- <p>You selected {{ $service->name }}, {{ $service->source_url }}</p> --}}
    <p>{!! $service->description !!}</p>
    @endforeach
  </div>
@endsection
