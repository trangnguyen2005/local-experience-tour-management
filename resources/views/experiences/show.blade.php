@extends('layouts.app', ['title' => $experience->title])

@section('content')
    <div class="grid">
        <div class="hero">
            <div class="card">
                <div class="image-box">
                    @if($experience->image)
                        @php
                            $imageUrl = \Illuminate\Support\Str::startsWith($experience->image, ['http://', 'https://', 'images/'])
                                ? asset($experience->image)
                                : asset('storage/'.$experience->image);
                        @endphp
                        <img src="{{ $imageUrl }}" alt="{{ $experience->title }}">
                    @else
                        <span>Chưa có hình ảnh</span>
                    @endif
                </div>

                <h1>{{ $experience->title }}</h1>
                <p class="meta">
                    <span>{{ $experience->category->name }}</span>
                    <span>{{ $experience->location }}</span>
                    <span>{{ $experience->organizer->name }}</span>
                </p>

                <p>{{ $experience->description }}</p>

                <table>
                    <tbody>
                        <tr>
                            <th>Giá tham gia</th>
                            <td class="price">{{ number_format($experience->price, 0, ',', '.') }} đ / người</td>
                        </tr>
                        <tr>
                            <th>Thời gian bắt đầu</th>
                            <td>{{ $experience->start_at?->format('d/m/Y H:i') ?? 'Lịch linh hoạt' }}</td>
                        </tr>
                        <tr>
                            <th>Thời gian kết thúc</th>
                            <td>{{ $experience->end_at?->format('d/m/Y H:i') ?? 'Chưa cập nhật' }}</td>
                        </tr>
                        <tr>
                            <th>Số chỗ</th>
                            <td>
                                @if($remainingSlots === null)
                                    Không giới hạn
                                @else
                                    Còn {{ $remainingSlots }} / {{ $experience->max_participants }} chỗ
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card">
                <h2>Đăng ký tham gia</h2>

                @guest
                    <p>Bạn cần đăng nhập để đăng ký trải nghiệm này.</p>
                    <div class="actions">
                        <a class="btn link" href="{{ route('login') }}">Đăng nhập</a>
                        <a class="btn light link" href="{{ route('register') }}">Đăng ký tài khoản</a>
                    </div>
                @else
                    @if($remainingSlots === 0)
                        <p class="error">Trải nghiệm này đã hết chỗ.</p>
                    @else
                        <form method="post" action="{{ route('bookings.store', $experience) }}">
                            @csrf

                            <div class="field">
                                <label for="participants_count">Số người tham gia</label>
                                <input id="participants_count" type="number" min="1" max="{{ $remainingSlots ?? 20 }}" name="participants_count" value="{{ old('participants_count', 1) }}" required>
                            </div>

                            <div class="field">
                                <label for="contact_name">Tên liên hệ</label>
                                <input id="contact_name" name="contact_name" value="{{ old('contact_name', auth()->user()->name) }}" required>
                            </div>

                            <div class="field">
                                <label for="contact_email">Email liên hệ</label>
                                <input id="contact_email" type="email" name="contact_email" value="{{ old('contact_email', auth()->user()->email) }}" required>
                            </div>

                            <div class="field">
                                <label for="contact_phone">Số điện thoại</label>
                                <input id="contact_phone" name="contact_phone" value="{{ old('contact_phone') }}" required>
                            </div>

                            <div class="field">
                                <label for="note">Ghi chú</label>
                                <textarea id="note" name="note" rows="4">{{ old('note') }}</textarea>
                            </div>

                            <button type="submit" class="btn">Gửi đăng ký</button>
                        </form>
                    @endif
                @endguest
            </div>
        </div>

        <p>
            <a href="{{ route('experiences.index') }}">Quay lại danh sách trải nghiệm</a>
        </p>
    </div>
@endsection
