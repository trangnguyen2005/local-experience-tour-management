@extends('layouts.admin', ['title' => 'Đơn đăng ký', 'header' => 'Quản lý đơn đăng ký'])

@section('content')
    <div class="card">
        <div class="card-header">
            <form method="get" action="{{ route('admin.bookings.index') }}" class="form-inline">
                <label for="status" class="mr-2">Lọc trạng thái</label>
                <select id="status" name="status" class="form-control mr-2">
                    <option value="">Tất cả</option>
                    <option value="pending" @selected(($filters['status'] ?? '') === 'pending')>Chờ xác nhận</option>
                    <option value="confirmed" @selected(($filters['status'] ?? '') === 'confirmed')>Đã xác nhận</option>
                    <option value="canceled" @selected(($filters['status'] ?? '') === 'canceled')>Đã hủy</option>
                </select>
                <button type="submit" class="btn btn-primary">Lọc</button>
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary ml-2">Xóa lọc</a>
            </form>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Khách hàng</th>
                        <th>Hoạt động</th>
                        <th>Số người</th>
                        <th>Tổng tiền</th>
                        <th>Liên hệ</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th class="text-right">Xử lý</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td>#{{ $booking->id }}</td>
                            <td>
                                <strong>{{ $booking->user->name }}</strong>
                                <div class="text-muted">{{ $booking->user->email }}</div>
                            </td>
                            <td>{{ $booking->experience->title }}</td>
                            <td>{{ $booking->participants_count }}</td>
                            <td>{{ number_format($booking->total_price, 0, ',', '.') }} đ</td>
                            <td>
                                {{ $booking->contact_name }}
                                <div class="text-muted">{{ $booking->contact_phone }}</div>
                                <div class="text-muted">{{ $booking->contact_email }}</div>
                            </td>
                            <td>
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
                                <span class="badge badge-{{ $statusClass }}">{{ $statusLabel }}</span>
                            </td>
                            <td>{{ $booking->created_at?->format('d/m/Y H:i') }}</td>
                            <td class="text-right">
                                @if($booking->status !== 'confirmed')
                                    <form method="post" action="{{ route('admin.bookings.update-status', $booking) }}" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="confirmed">
                                        <button type="submit" class="btn btn-success btn-sm">Xác nhận</button>
                                    </form>
                                @endif
                                @if($booking->status !== 'canceled')
                                    <form method="post" action="{{ route('admin.bookings.update-status', $booking) }}" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="canceled">
                                        <button type="submit" class="btn btn-danger btn-sm">Hủy</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Chưa có đơn đăng ký.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $bookings->links() }}
        </div>
    </div>
@endsection
