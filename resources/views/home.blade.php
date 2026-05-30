@extends('layouts.app', ['title' => 'Trang chủ'])

@section('content')
    <section class="hero-home">
        <div class="hero-content">
            <div class="eyebrow">Explore Vietnam like a local</div>
            <h1>Trải nghiệm địa phương, đặt lịch dễ dàng</h1>
            <p>Khám phá làng nghề, văn hóa, ẩm thực và những hoạt động bản địa được tổ chức bởi người địa phương.</p>
            <div class="hero-actions">
                <a class="btn accent link" href="{{ route('experiences.index') }}">Xem các chuyến tham quan</a>
                @guest
                    <a class="btn link" href="{{ route('register') }}">Tạo tài khoản</a>
                @endguest
            </div>
        </div>
    </section>

    <section class="destinations-section">
        <div class="destinations-inner">
            <h2 class="destinations-title">Điểm đến độc đáo</h2>

            <div class="destinations-grid">
                <a class="destination-card" href="{{ route('experiences.index', ['location' => 'Sapa']) }}">
                    <img src="https://images.unsplash.com/photo-1606820854416-439b3305ff39?auto=format&fit=crop&w=700&q=80" alt="Sapa">
                    <span>Sapa</span>
                </a>

                <a class="destination-card" href="{{ route('experiences.index', ['location' => 'Ninh Bình']) }}">
                    <img src="https://images.unsplash.com/photo-1528127269322-539801943592?auto=format&fit=crop&w=700&q=80" alt="Ninh Bình">
                    <span>Ninh Bình</span>
                </a>

                <a class="destination-card" href="{{ route('experiences.index', ['location' => 'Mekong Delta']) }}">
                    <img src="https://images.unsplash.com/photo-1583417319070-4a69db38a482?auto=format&fit=crop&w=700&q=80" alt="Mekong Delta">
                    <span>Mekong Delta</span>
                </a>

                <a class="destination-card" href="{{ route('experiences.index', ['location' => 'Hội An']) }}">
                    <img src="https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?auto=format&fit=crop&w=700&q=80" alt="Hội An">
                    <span>Hội An</span>
                </a>

                <a class="destination-card" href="{{ route('experiences.index', ['location' => 'Hà Nội']) }}">
                    <img src="https://images.unsplash.com/photo-1509030450996-dd1a26dda07a?auto=format&fit=crop&w=700&q=80" alt="Hà Nội">
                    <span>Hà Nội</span>
                </a>

                <a class="destination-card" href="{{ route('experiences.index', ['location' => 'HCM']) }}">
                    <img src="https://images.unsplash.com/photo-1583417319070-4a69db38a482?auto=format&fit=crop&w=700&q=80" alt="HCM">
                    <span>HCM</span>
                </a>

                <a class="destination-card" href="{{ route('experiences.index', ['location' => 'Nha Trang']) }}">
                    <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=700&q=80" alt="Nha Trang">
                    <span>Nha Trang</span>
                </a>

                <a class="destination-card" href="{{ route('experiences.index', ['location' => 'Hà Giang']) }}">
                    <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=700&q=80" alt="Hà Giang">
                    <span>Hà Giang</span>
                </a>
            </div>
        </div>
    </section>

    <section class="section about-section">
        <div class="about-copy">
            <h2 class="about-title">Giới thiệu về chúng tôi</h2>

            <h3>Sứ mệnh của chúng tôi</h3>
            <p>Sứ mệnh của chúng tôi là kết nối du khách với những người tổ chức địa phương đáng tin cậy, tạo ra những trải nghiệm văn hóa đích thực trên khắp Việt Nam.</p>

            <h3>Chúng tôi là ai</h3>
            <p>VN Local Experience là nền tảng giới thiệu và đặt các hoạt động trải nghiệm địa phương, giúp du khách dễ dàng tìm kiếm, xem chi tiết và đăng ký các chuyến tham quan phù hợp.</p>

            <h3>Những gì chúng tôi cung cấp</h3>
            <p>Khám phá các tour được cá nhân hóa như làng nghề, ẩm thực, văn hóa và thiên nhiên, được tổ chức bởi những người am hiểu địa phương.</p>
        </div>

        <div class="about-visual" aria-label="Experience Vietnam">
            <div class="about-visual-content">
                <div>
                    <div class="about-brand-text">
                        <strong>Experience</strong>
                        <span>VIET NAM</span>
                        <em>Like Never Before</em>
                    </div>

                    <div class="about-tags">
                        <span>Kết nối địa phương</span>
                        <span>Hỗ trợ đa ngôn ngữ</span>
                        <span>Chuyến đi thực tế</span>
                    </div>
                </div>

                <div class="about-stats">
                    <div>
                        <strong>200+</strong>
                        <span>Hướng dẫn viên đã xác minh</span>
                    </div>
                    <div>
                        <strong>5000+</strong>
                        <span>Du khách hài lòng</span>
                    </div>
                    <div>
                        <strong>15+</strong>
                        <span>Địa điểm địa phương</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="why-section">
        <div class="why-inner">
            <h2 class="why-title">Tại sao nên chọn VN Local Guide?</h2>
            <p class="why-subtitle">Trải nghiệm Việt Nam qua góc nhìn của người dân địa phương</p>

            <div class="why-grid">
                <div class="why-item">
                    <div class="why-icon green">✓</div>
                    <h3>Hướng dẫn đã được xác minh</h3>
                    <p>Đáng tin cậy và được đánh giá cao</p>
                </div>

                <div class="why-item">
                    <div class="why-icon orange">ϟ</div>
                    <h3>Đặt chỗ ngay lập tức</h3>
                    <p>Nhanh chóng và linh hoạt</p>
                </div>

                <div class="why-item">
                    <div class="why-icon red">◎</div>
                    <h3>Trải nghiệm đích thực</h3>
                    <p>Bí mật địa phương thực sự</p>
                </div>

                <div class="why-item">
                    <div class="why-icon brown">✣</div>
                    <h3>Hỗ trợ 24/7</h3>
                    <p>Luôn luôn có sự trợ giúp</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section-head">
            <div>
                <div class="eyebrow">Unique destinations</div>
                <h2 class="section-title">Loại trải nghiệm nổi bật</h2>
            </div>
            <a href="{{ route('experiences.index') }}">Xem tất cả</a>
        </div>

        <div class="grid cards">
            @forelse($categories as $category)
                <a class="card category-card" href="{{ route('experiences.index', ['category_id' => $category->id]) }}" style="text-decoration: none;">
                    <span class="badge">{{ $category->experiences_count }} chuyến</span>
                    <div>
                        <h3>{{ $category->name }}</h3>
                        <p class="muted">{{ $category->description ?? 'Các hoạt động địa phương được tuyển chọn.' }}</p>
                    </div>
                </a>
            @empty
                <div class="card">
                    <p>Chưa có loại trải nghiệm.</p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="section">
        <div class="section-head">
            <div>
                <div class="eyebrow">Featured tours</div>
                <h2 class="section-title">Các chuyến tham quan được đề xuất</h2>
                <p class="muted">Những trải nghiệm đã sẵn sàng để người dùng xem chi tiết và đăng ký.</p>
            </div>
            <a class="btn light link" href="{{ route('experiences.index') }}">Xem thêm chuyến</a>
        </div>

        <div class="grid cards">
            @forelse($featuredExperiences as $experience)
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
                        <h3>{{ $experience->title }}</h3>
                        <p class="meta">
                            <span>{{ $experience->location }}</span>
                            <span>by {{ $experience->organizer->name }}</span>
                        </p>
                        <p>{{ \Illuminate\Support\Str::limit($experience->description, 110) }}</p>
                        <p class="price">{{ number_format($experience->price, 0, ',', '.') }} đ / người</p>
                        <a class="btn link" href="{{ route('experiences.show', $experience) }}">Xem chi tiết</a>
                    </div>
                </article>
            @empty
                <div class="card">
                    <p>Chưa có chuyến tham quan nổi bật.</p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="section">
        <div class="grid cards">
            <div class="card">
                <div class="eyebrow">Verified guides</div>
                <h3>Người tổ chức rõ thông tin</h3>
                <p class="muted">Mỗi trải nghiệm gắn với đơn vị hoặc người tổ chức để người dùng dễ theo dõi.</p>
            </div>
            <div class="card">
                <div class="eyebrow">Instant booking</div>
                <h3>Đăng ký nhanh</h3>
                <p class="muted">Người dùng đăng nhập, nhập số người tham gia và gửi đơn chờ xác nhận.</p>
            </div>
            <div class="card">
                <div class="eyebrow">Local activities</div>
                <h3>Nội dung bản địa</h3>
                <p class="muted">Phù hợp các hoạt động làng nghề, ẩm thực, văn hóa và trải nghiệm ngoài trời.</p>
            </div>
        </div>
    </section>
@endsection
