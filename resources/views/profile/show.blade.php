<?php
<h1>{{ $user->username }}'s Profiel</h1>

@if($user->profile_photo)
    <img src="{{ asset('storage/'.$user->profile_photo) }}" alt="Profielfoto" width="150">
@endif

<p>Verjaardag: {{ $user->birthday }}</p>
<p>Over mij: {{ $user->about }}</p>

@auth
    @if(Auth::id() === $user->id)
        <a href="{{ route('profile.edit') }}">Bewerk profiel</a>
    @endif
@endauth

