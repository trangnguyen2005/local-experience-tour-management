@extends('layouts.admin', ['title' => 'Sửa loại trải nghiệm', 'header' => 'Sửa loại trải nghiệm'])

@section('content')
    <div class="card">
        <form method="post" action="{{ route('admin.categories.update', $category) }}">
            @method('PUT')
            @include('admin.categories.form', ['category' => $category])
        </form>
    </div>
@endsection
