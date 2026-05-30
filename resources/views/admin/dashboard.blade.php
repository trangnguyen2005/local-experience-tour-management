@extends('layouts.admin', ['title' => 'Dashboard quản trị', 'header' => 'Dashboard quản trị'])

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>0</h3>
                    <p>Hoạt động trải nghiệm</p>
                </div>
                <div class="icon">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>0</h3>
                    <p>Đơn đăng ký</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-signature"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>0</h3>
                    <p>Người dùng</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>0 ₫</h3>
                    <p>Doanh thu</p>
                </div>
                <div class="icon">
                    <i class="fas fa-coins"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thông tin nhanh</h3>
        </div>
        <div class="card-body">
            <p class="mb-2">Bạn đang đăng nhập với vai trò: <strong>{{ auth()->user()->role }}</strong>.</p>
            <p class="mb-0">Giao diện quản trị hiện đã dùng AdminLTE 3 cho khu vực <code>/admin</code>.</p>
        </div>
    </div>
@endsection
