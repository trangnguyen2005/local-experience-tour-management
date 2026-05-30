@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
    <div class="card">
        <h1>Dashboard người dùng</h1>
        <p>Xin chào {{ auth()->user()->name }}.</p>
        <p>Vai trò hiện tại: <strong>{{ auth()->user()->role }}</strong></p>
        <div class="actions">
            <a class="btn link" href="{{ route('experiences.index') }}">Xem trải nghiệm</a>
            <a class="btn light link" href="{{ route('bookings.index') }}">Lịch sử đăng ký</a>
        </div>
    </div>
@endsection
