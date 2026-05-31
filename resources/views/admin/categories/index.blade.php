@extends('layouts.admin', ['title' => 'Loại trải nghiệm', 'header' => 'Quản lý loại trải nghiệm'])

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h3 class="card-title mb-0">Danh sách loại trải nghiệm</h3>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm ml-auto">
                <i class="fas fa-plus"></i> Thêm loại
            </a>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Slug</th>
                        <th>Mô tả</th>
                        <th>Số hoạt động</th>
                        <th class="text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td><code>{{ $category->slug }}</code></td>
                            <td>{{ \Illuminate\Support\Str::limit($category->description, 80) }}</td>
                            <td>{{ $category->experiences_count }}</td>
                            <td class="text-right">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form method="post" action="{{ route('admin.categories.destroy', $category) }}" class="d-inline" onsubmit="return confirm('Xóa loại trải nghiệm này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Chưa có loại trải nghiệm.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
