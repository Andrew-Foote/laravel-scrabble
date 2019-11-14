@extends('layouts.app')
@section('content')
<section>
	<h2>Personal details</h2>
	<dl>
		<dt>Name</dt>
		<dd>{{ $member->name }}</dd>
		<dt>Email</dt>
		<dd>{{ $member->email }}</dd>
	</dl>

	<a href="{{ route('profile-edit', ['member_id' => $member->id]) }}">Edit</a>

<section>
	<h2>Statistics</h2>
	</dl>
		<dt>Member since</dt>
		<dd>{{ $member->joindate }}</dd>
		<dt>Recorded wins</dt>
		<dd>{{ $member->winCount }}</dd>
		<dt>Recorded losses</dt>
		<dd>{{ $member->lossCount }}</dd>
	</dl>
</section>
@endsection