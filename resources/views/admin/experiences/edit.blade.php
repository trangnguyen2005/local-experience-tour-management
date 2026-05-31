@extends('layouts.admin', ['title' => 'Sửa hoạt động', 'header' => 'Sửa hoạt động trải nghiệm'])

@section('content')
    <div class="card">
        <form method="post" action="{{ route('admin.experiences.update', $experience) }}" enctype="multipart/form-data">
            @method('PUT')
            @include('admin.experiences.form', [
                'experience' => $experience,
                'categories' => $categories,
                'organizers' => $organizers,
            ])
        </form>
    </div>
@endsection
