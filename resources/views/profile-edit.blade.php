@extends('layouts.app')
@section('content')
<section>
	<h2>Personal details</h2>
	<form action="{{ route('profile-edit-submit', ['member_id' => $member->id]) }}" method="post">
		@if ($errors->any())
			Invalid data
			<br>
		@endif
		{!! csrf_field() !!}
		<label for="name">Name</label>
		<input type="text" id="name" name="name" value="{{ $member->name }}">
		@if($errors->has('name'))
			{{ $errors->first('name') }}
		@endif
		<br>
		<label for="email">Email</label>
		<input type="email" id="email" name="email" value="{{ $member->email }}">
		<br>
		@if($errors->has('email'))
			{{ $errors->first('email') }}
		@endif
		<br>
		<input type="submit" value="Submit">
	</form>
</section>
@endsection