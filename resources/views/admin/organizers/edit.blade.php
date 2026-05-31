@extends('layouts.admin', ['title' => 'Sửa người tổ chức', 'header' => 'Sửa người tổ chức'])

@section('content')
    <div class="card">
        <form method="post" action="{{ route('admin.organizers.update', $organizer) }}">
            @method('PUT')
            @include('admin.organizers.form', ['organizer' => $organizer])
        </form>
    </div>
@endsection
