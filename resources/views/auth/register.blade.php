@extends('layouts.app', ['title' => 'Đăng ký'])

@section('content')
    <div class="card">
        <h1>Đăng ký tài khoản</h1>
        <form method="post" action="{{ route('register.store') }}">
            @csrf
            <div class="field">
                <label for="name">Họ tên</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="field">
                <label for="password">Mật khẩu</label>
                <input id="password" type="password" name="password" required>
            </div>
            <div class="field">
                <label for="password_confirmation">Xác nhận mật khẩu</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn">Đăng ký</button>
        </form>
    </div>
@endsection
