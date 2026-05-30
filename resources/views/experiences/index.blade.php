@extends('layouts.app', ['title' => 'Danh sách trải nghiệm'])

@section('content')
    <div class="grid">
        <div class="section-head">
            <div>
                <div class="eyebrow">Tours and activities</div>
                <h1 class="section-title">Các chuyến tham quan</h1>
                <p class="muted">Tìm hoạt động theo địa điểm, loại trải nghiệm hoặc khoảng giá phù hợp.</p>
            </div>
        </div>

        <div class="card">
            <form method="get" action="{{ route('experiences.index') }}" class="filters">
                <div class="field">
                    <label for="q">Từ khóa</label>
                    <input id="q" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Làm gốm, nấu ăn...">
                </div>

                <div class="field">
                    <label for="location">Địa điểm</label>
                    <input id="location" name="location" value="{{ $filters['location'] ?? '' }}" placeholder="Hội An, Đà Lạt...">
                </div>

                <div class="field">
                    <label for="category_id">Loại trải nghiệm</label>
                    <select id="category_id" name="category_id">
                        <option value="">Tất cả</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @selected(($filters['category_id'] ?? '') == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="field">
                    <label for="min_price">Giá từ</label>
                    <input id="min_price" type="number" min="0" name="min_price" value="{{ $filters['min_price'] ?? '' }}">
                </div>

                <div class="field">
                    <label for="max_price">Giá đến</label>
                    <input id="max_price" type="number" min="0" name="max_price" value="{{ $filters['max_price'] ?? '' }}">
                </div>

                <div class="actions">
                    <button type="submit" class="btn">Tìm kiếm</button>
                    <a class="btn light link" href="{{ route('experiences.index') }}">Xóa lọc</a>
                </div>
            </form>
        </div>

        @if($experiences->isEmpty())
            <div class="card">
                <p>Chưa có trải nghiệm phù hợp.</p>
            </div>
        @else
            <div class="grid cards">
                @foreach($experiences as $experience)
                    <article class="card tour-card">
                        <div class="image-box">
                            @if($experience->image)
                                @php
                                    $imageUrl = \Illuminate\Support\Str::startsWith($experience->image, ['http://', 'https://', 'images/'])
                                        ? asset($experience->image)
                                        : asset('storage/'.$experience->image);
                                @endphp
                                <img src="{{ $imageUrl }}" alt="{{ $experience->title }}">
                            @else
                                <div class="fallback-image">{{ $experience->location }}</div>
                            @endif
                        </div>

                        <div class="tour-card-body">
                            <span class="badge">{{ $experience->category->name }}</span>
                            <h2>{{ $experience->title }}</h2>
                            <p class="meta">
                                <span>{{ $experience->location }}</span>
                                <span>by {{ $experience->organizer->name }}</span>
                            </p>
                            <p>{{ \Illuminate\Support\Str::limit($experience->description, 120) }}</p>
                            <p class="price">{{ number_format($experience->price, 0, ',', '.') }} đ / người</p>
                            <p class="muted">
                                @if($experience->start_at)
                                    Bắt đầu: {{ $experience->start_at->format('d/m/Y H:i') }}
                                @else
                                    Lịch linh hoạt
                                @endif
                            </p>
                            <a class="btn link" href="{{ route('experiences.show', $experience) }}">Xem chi tiết</a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="pagination">
                {{ $experiences->links() }}
            </div>
        @endif
    </div>
@endsection
