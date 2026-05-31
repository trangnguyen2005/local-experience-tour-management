@extends('layouts.admin', ['title' => 'Thêm hoạt động', 'header' => 'Thêm hoạt động trải nghiệm'])

@section('content')
    <div class="card">
        <form method="post" action="{{ route('admin.experiences.store') }}" enctype="multipart/form-data">
            @include('admin.experiences.form', [
                'experience' => $experience,
                'categories' => $categories,
                'organizers' => $organizers,
            ])
        </form>
    </div>
@endsection
