@extends('layouts.master')

@section('title')
	{{ $title }}
@endsection

@section('sidebar')
@endsection

@section('content')
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <img src="/images/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;" />
      <h2>{{ $user->first_name}} {{ $user->last_name}}'s Profile</h2>
			<p>Email Address: {{ $user->email }}</p>
			<p>
				@if(Auth::user()->is_admin == 1)
					Status: Admin
				@else
					Status: Active User
				@endif
			</p>


      <form class="form-horizontal" enctype="multipart/form-data" action="/profile/" method="POST">
        <label class="col-sm-3 control-label">Update Profile Image</label><br />
          <input class="form-file" type="file" name="avatar">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="submit" class="pull-right btn btn--sm btn-primary">
      </form>
    </div>
  </div>
@endsection
