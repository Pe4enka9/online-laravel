@extends('layouts.main')
@section('title', 'Главная')

@section('content')

    <a href="{{ route('logout') }}" class="mb-3 btn btn-outline-primary">Выйти</a>
    <h1 class="mb-3 text-primary">@yield('title')</h1>

    <h2>Привет, {{ $user->login }}!</h2>
    <h3>
    </h3>

    <div class="row">
        <div class="col-3">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Логин</th>
                </tr>
                </thead>
                <tbody>
                @foreach($allUsers as $allUser)
                    <tr>
                        <td>{{ $allUser->login }}</td>
                        <td><a href="{{ route('showUser', $allUser->login) }}">Перейти</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
