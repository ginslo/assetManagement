@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')
@endsection

@section('content')
<div class="row">
	<div class="col-sm-8 col-md-offset-4">
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
				<td class="servtable"><a href="{{ route('registrars.registrar.show', $registrar->id) }}">{{ $registrar->name }}</a></td>
			</tr>
				@endforeach
		</table>
	</div>
</div>
@endsection
