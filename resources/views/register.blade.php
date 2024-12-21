@extends('layouts.main')
@section('title', 'Регистрация')

@section('content')

    <h1 class="mb-3 text-primary">@yield('title')</h1>

    <div class="row">
        <div class="col-4">
            <form action="{{ route('register.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input type="text" name="login" id="login"
                           class="form-control {{ $errors->has('login') ? 'is-invalid' : '' }}"
                           value="{{ old('login') }}">
                    @error('login')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" name="password" id="password"
                           class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <input type="submit" value="Зарегистрироваться" class="mb-3 btn btn-success">

                <a href="{{ route('login.index') }}" class="d-block">Авторизация</a>
            </form>
        </div>
    </div>

@endsection
