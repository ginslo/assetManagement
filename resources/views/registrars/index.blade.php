@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')

@section('content')
<div class="row">
	<div class="col-sm-12 col-md-12">
		<h2>{{ $title }}</h2>
		<a href="/registrars/create"><span title="Add New registrar"><i class="fa fa-plus" aria-hidden="true"></i></span> New Registrar</a>
		<br />
		<table>
			<tr>
				<th class="servtable">ID</th>
				<th class="servtable">Registrar Name</th>
			</tr>
				@foreach ($registrars as $registrar)
			<tr>
				<td class="servtable">{{ $registrar->id }}</td>
				<td class="servtable"><a href="/registrars/registrar/{{ $registrar->id }}">{{ $registrar->name }}</a></td>
			</tr>
				@endforeach
		</table>
	</div>
</div>
@endsection
