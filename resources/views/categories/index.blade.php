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
		<a href="/categories/create"><span title="Add New Category"><i class="fa fa-plus" aria-hidden="true"></i></span> New Category</a>
		<br />
		<table>
			<tr>
				<th class="servtable">ID</th>
				<th class="servtable">Category Name</th>
			</tr>
				@foreach ($categories as $category)
			<tr>
				<td class="servtable">{{ $category->id }}</td>
				<td class="servtable"><a href="{{ route('categories.category.show', $category->id) }}">{{ $category->name }}</a></td>
			</tr>
				@endforeach
		</table>
		{{ $categories->links() }}
	</div>
</div>
@endsection
