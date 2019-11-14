@extends('layouts.app')
@section('content')
<section>
    <h2>Members</h2>
    <ul>
        @foreach ($members as $member)
            <li><a href="{{ route('profile', ['member_id' => $member->id]) }}">{{ $member->name }}</a></li>
        @endforeach
    </ul>
    <a href="{{ route('leaderboard') }}">Leaderboard</a>
</section>
@endsection