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
                    <h3>{{ number_format($confirmedRevenue, 0, ',', '.') }} ₫</h3>
                    <p>Doanh thu đã xác nhận</p>
                </div>
                <div class="icon">
                    <i class="fas fa-coins"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $pendingBookingCount }}</h3>
                    <p>Đơn chờ xác nhận</p>
                </div>
                <div class="icon">
                    <i class="fas fa-hourglass-half"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $confirmedBookingCount }}</h3>
                    <p>Đơn đã xác nhận</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-light">
                <div class="inner">
                    <h3>{{ $canceledBookingCount }}</h3>
                    <p>Đơn đã hủy</p>
                </div>
                <div class="icon">
                    <i class="fas fa-ban"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>{{ number_format($expectedRevenue, 0, ',', '.') }} ₫</h3>
                    <p>Doanh thu dự kiến</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-line"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Doanh thu đã xác nhận 6 tháng gần nhất</h3>
                </div>
                <div class="card-body">
                    <canvas id="revenueChart" height="120"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tỷ lệ trạng thái đơn</h3>
                </div>
                <div class="card-body">
                    <canvas id="bookingStatusChart" height="260"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Top hoạt động được đăng ký</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Hoạt động</th>
                                <th class="text-center">Số đơn</th>
                                <th class="text-right">Doanh thu xác nhận</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($topExperiences as $experience)
                                <tr>
                                    <td>
                                        <strong>{{ $experience->title }}</strong>
                                        <div class="text-muted">{{ $experience->location }}</div>
                                    </td>
                                    <td class="text-center">{{ $experience->bookings_count }}</td>
                                    <td class="text-right">{{ number_format($experience->confirmed_revenue ?? 0, 0, ',', '.') }} ₫</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Chưa có dữ liệu đăng ký.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Đơn đăng ký gần đây</h3>
                </div>
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        @forelse($recentBookings as $booking)
                            @php
                                $statusClass = [
                                    'pending' => 'warning',
                                    'confirmed' => 'success',
                                    'canceled' => 'danger',
                                ][$booking->status] ?? 'secondary';
                                $statusLabel = [
                                    'pending' => 'Chờ xác nhận',
                                    'confirmed' => 'Đã xác nhận',
                                    'canceled' => 'Đã hủy',
                                ][$booking->status] ?? $booking->status;
                            @endphp
                            <li class="item">
                                <div class="product-info ml-0">
                                    <span class="product-title">
                                        #{{ $booking->id }} - {{ $booking->user->name }}
                                        <span class="badge badge-{{ $statusClass }} float-right">{{ $statusLabel }}</span>
                                    </span>
                                    <span class="product-description">
                                        {{ $booking->experience->title }} · {{ number_format($booking->total_price, 0, ',', '.') }} ₫
                                    </span>
                                </div>
                            </li>
                        @empty
                            <li class="item text-center py-3">Chưa có đơn đăng ký.</li>
                        @endforelse
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('admin.bookings.index') }}">Xem tất cả đơn đăng ký</a>
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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>
    <script>
        const revenueChart = document.getElementById('revenueChart');
        const bookingStatusChart = document.getElementById('bookingStatusChart');

        new Chart(revenueChart, {
            type: 'bar',
            data: {
                labels: @json($revenueChartLabels),
                datasets: [{
                    label: 'Doanh thu',
                    data: @json($revenueChartData),
                    backgroundColor: '#17a2b8',
                    borderRadius: 4,
                }],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        callbacks: {
                            label: (context) => new Intl.NumberFormat('vi-VN').format(context.parsed.y) + ' ₫',
                        },
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: (value) => new Intl.NumberFormat('vi-VN', {
                                notation: 'compact',
                            }).format(value) + ' ₫',
                        },
                    },
                },
            },
        });

        new Chart(bookingStatusChart, {
            type: 'doughnut',
            data: {
                labels: ['Chờ xác nhận', 'Đã xác nhận', 'Đã hủy'],
                datasets: [{
                    data: @json($bookingStatusChartData),
                    backgroundColor: ['#ffc107', '#28a745', '#dc3545'],
                }],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                },
            },
        });
    </script>
@endpush
