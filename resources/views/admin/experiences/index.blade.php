@extends('layouts.admin', ['title' => 'Hoạt động trải nghiệm', 'header' => 'Quản lý hoạt động trải nghiệm'])

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h3 class="card-title mb-0">Danh sách hoạt động</h3>
            <a href="{{ route('admin.experiences.create') }}" class="btn btn-primary btn-sm ml-auto">
                <i class="fas fa-plus"></i> Thêm hoạt động
            </a>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Loại</th>
                        <th>Người tổ chức</th>
                        <th>Địa điểm</th>
                        <th>Giá</th>
                        <th>Trạng thái</th>
                        <th>Đơn</th>
                        <th class="text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($experiences as $experience)
                        <tr>
                            <td>
                                @if($experience->image)
                                    @php
                                        $imageUrl = \Illuminate\Support\Str::startsWith($experience->image, ['http://', 'https://', 'images/'])
                                            ? asset($experience->image)
                                            : asset('storage/'.$experience->image);
                                    @endphp
                                    <img src="{{ $imageUrl }}" alt="{{ $experience->title }}" class="img-size-50">
                                @else
                                    <span class="text-muted">Không có</span>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $experience->title }}</strong>
                                <div><code>{{ $experience->slug }}</code></div>
                            </td>
                            <td>{{ $experience->category->name }}</td>
                            <td>{{ $experience->organizer->name }}</td>
                            <td>{{ $experience->location }}</td>
                            <td>{{ number_format($experience->price, 0, ',', '.') }} đ</td>
                            <td>
                                <span class="badge badge-{{ $experience->status === 'published' ? 'success' : 'secondary' }}">
                                    {{ $experience->status === 'published' ? 'Đã xuất bản' : 'Bản nháp' }}
                                </span>
                            </td>
                            <td>{{ $experience->bookings_count }}</td>
                            <td class="text-right">
                                <a href="{{ route('admin.experiences.edit', $experience) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form method="post" action="{{ route('admin.experiences.destroy', $experience) }}" class="d-inline" onsubmit="return confirm('Xóa hoạt động này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Chưa có hoạt động trải nghiệm.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $experiences->links() }}
        </div>
    </div>
@endsection
