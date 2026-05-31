@extends('layouts.admin', ['title' => 'Người tổ chức', 'header' => 'Quản lý người tổ chức'])

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h3 class="card-title mb-0">Danh sách người tổ chức</h3>
            <a href="{{ route('admin.organizers.create') }}" class="btn btn-primary btn-sm ml-auto">
                <i class="fas fa-plus"></i> Thêm người tổ chức
            </a>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Số hoạt động</th>
                        <th class="text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($organizers as $organizer)
                        <tr>
                            <td>{{ $organizer->name }}</td>
                            <td>{{ $organizer->email }}</td>
                            <td>{{ $organizer->phone }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($organizer->address, 60) }}</td>
                            <td>{{ $organizer->experiences_count }}</td>
                            <td class="text-right">
                                <a href="{{ route('admin.organizers.edit', $organizer) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form method="post" action="{{ route('admin.organizers.destroy', $organizer) }}" class="d-inline" onsubmit="return confirm('Xóa người tổ chức này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Chưa có người tổ chức.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $organizers->links() }}
        </div>
    </div>
@endsection
