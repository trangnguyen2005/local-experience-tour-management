@extends('layouts.admin', ['title' => 'Dashboard quản trị', 'header' => 'Dashboard quản trị'])

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $experienceCount }}</h3>
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
                    <h3>{{ $bookingCount }}</h3>
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
                    <h3>{{ $userCount }}</h3>
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
                    <h3>{{ number_format($revenue, 0, ',', '.') }} ₫</h3>
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
            <p class="mb-0">Khu vực quản trị hỗ trợ CRUD loại trải nghiệm, người tổ chức, hoạt động trải nghiệm và xử lý đơn đăng ký.</p>
        </div>
    </div>
@endsection
