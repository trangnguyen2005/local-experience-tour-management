@extends('layouts.app', ['title' => 'Lịch sử đăng ký'])

@section('content')
    <div class="card">
        <h1>Lịch sử đăng ký trải nghiệm</h1>

        @if($bookings->isEmpty())
            <p>Bạn chưa đăng ký trải nghiệm nào.</p>
            <a class="btn link" href="{{ route('experiences.index') }}">Xem danh sách trải nghiệm</a>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Trải nghiệm</th>
                        <th>Thời gian</th>
                        <th>Số người</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr>
                            <td>
                                <a href="{{ route('experiences.show', $booking->experience) }}">
                                    {{ $booking->experience->title }}
                                </a>
                                <div class="muted">{{ $booking->experience->location }}</div>
                            </td>
                            <td>{{ $booking->experience->start_at?->format('d/m/Y H:i') ?? 'Lịch linh hoạt' }}</td>
                            <td>{{ $booking->participants_count }}</td>
                            <td>{{ number_format($booking->total_price, 0, ',', '.') }} đ</td>
                            <td>
                                @switch($booking->status)
                                    @case('confirmed')
                                        Đã xác nhận
                                        @break
                                    @case('canceled')
                                        Đã hủy
                                        @break
                                    @default
                                        Chờ xác nhận
                                @endswitch
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination">
                {{ $bookings->links() }}
            </div>
        @endif
    </div>
@endsection
