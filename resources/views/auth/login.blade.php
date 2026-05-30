@extends('layouts.app', ['title' => 'Đăng nhập'])

@section('content')
    <div class="card">
        <h1>Đăng nhập</h1>
        <form method="post" action="{{ route('login.attempt') }}">
            @csrf
            <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="field">
                <label for="password">Mật khẩu</label>
                <input id="password" type="password" name="password" required>
            </div>
            <button type="submit" class="btn">Đăng nhập</button>
        </form>
    </div>
@endsection
