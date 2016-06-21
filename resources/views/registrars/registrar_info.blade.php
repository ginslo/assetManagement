@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')

@section('content')

<div class="row">
	<div class="col-sm-9 col-md-5 col-md-offset-3">
		<i class="fa fa-backward" aria-hidden="true"></i> <a href="/home">Home</a>
		<h1>{{ $title }}</h1>
		<table>
			<tr>
				<th class="servtable">Details: </th><td class="servtable">{{ $registrar->name }}</td>
			</tr>
			</table>
  </div>
</div>

<div class="row">
	<div class="col-sm-9 col-md-5 col-md-offset-3">
		<h2>My Domain Names at {{ $registrar->name }}</h2>
			<table>
				@foreach($domain_names as $domain_name)
	        @if($domain_name->user_id == Auth::user()->id)
						<tr>
					  	<td class="servtable"><a href="/domain_names/my_domain_name/{{ $domain_name->id }}">{{ $domain_name->name }}</a></td>
						</tr>
	        @endif
				@endforeach
			</table>
		</div>
	</div>

@endsection
