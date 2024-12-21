@extends('layouts.main')
@section('title', $user->login)

@section('content')

    <a href="{{ route('index') }}" class="mb-3 btn btn-outline-primary">Назад</a>
    <h1 class="mb-3">@yield('title')</h1>

    <h3>
        @if(Cache::has('user-online' . $user->id))
            Онлайн
        @else
            Был в
            сети {{ Cache::has('user-last-seen' . $user->id) ? \Carbon\Carbon::parse(Cache::get('user-last-seen' . $user->id))->diffForHumans() : ''}}
        @endif
    </h3>

@endsection
