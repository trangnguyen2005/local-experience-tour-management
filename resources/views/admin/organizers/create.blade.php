@extends('layouts.admin', ['title' => 'Thêm người tổ chức', 'header' => 'Thêm người tổ chức'])

@section('content')
    <div class="card">
        <form method="post" action="{{ route('admin.organizers.store') }}">
            @include('admin.organizers.form', ['organizer' => $organizer])
        </form>
    </div>
@endsection
