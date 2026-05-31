@extends('layouts.admin', ['title' => 'Thêm loại trải nghiệm', 'header' => 'Thêm loại trải nghiệm'])

@section('content')
    <div class="card">
        <form method="post" action="{{ route('admin.categories.store') }}">
            @include('admin.categories.form', ['category' => $category])
        </form>
    </div>
@endsection
