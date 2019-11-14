@extends('layouts.app')
@section('content')
<section>
	<h2>Leaderboard</h2>
	<ol>
		@foreach ($members as $member)
			<li><a href="{{ route('profile', ['member_id' => $member->id]) }}">{{ $member->name }}</a> (average score: {{ number_format($member->average_score, 1) }})</li>
		@endforeach
	</ol>
</section>
@endsection