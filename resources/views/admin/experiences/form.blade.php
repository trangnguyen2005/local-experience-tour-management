@csrf
<div class="card-body">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="title">Tên hoạt động</label>
            <input id="title" name="title" class="form-control" value="{{ old('title', $experience->title) }}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="slug">Slug</label>
            <input id="slug" name="slug" class="form-control" value="{{ old('slug', $experience->slug) }}" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="experience_category_id">Loại trải nghiệm</label>
            <select id="experience_category_id" name="experience_category_id" class="form-control" required>
                <option value="">Chọn loại trải nghiệm</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('experience_category_id', $experience->experience_category_id) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="organizer_id">Người tổ chức</label>
            <select id="organizer_id" name="organizer_id" class="form-control" required>
                <option value="">Chọn người tổ chức</option>
                @foreach($organizers as $organizer)
                    <option value="{{ $organizer->id }}" @selected(old('organizer_id', $experience->organizer_id) == $organizer->id)>
                        {{ $organizer->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea id="description" name="description" rows="5" class="form-control">{{ old('description', $experience->description) }}</textarea>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="location">Địa điểm</label>
            <input id="location" name="location" class="form-control" value="{{ old('location', $experience->location) }}" required>
        </div>
        <div class="form-group col-md-4">
            <label for="price">Giá</label>
            <input id="price" type="number" min="0" step="1000" name="price" class="form-control" value="{{ old('price', $experience->price) }}" required>
        </div>
        <div class="form-group col-md-4">
            <label for="max_participants">Số người tối đa</label>
            <input id="max_participants" type="number" min="1" name="max_participants" class="form-control" value="{{ old('max_participants', $experience->max_participants) }}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="start_at">Bắt đầu</label>
            <input id="start_at" type="datetime-local" name="start_at" class="form-control" value="{{ old('start_at', $experience->start_at?->format('Y-m-d\\TH:i')) }}">
        </div>
        <div class="form-group col-md-4">
            <label for="end_at">Kết thúc</label>
            <input id="end_at" type="datetime-local" name="end_at" class="form-control" value="{{ old('end_at', $experience->end_at?->format('Y-m-d\\TH:i')) }}">
        </div>
        <div class="form-group col-md-4">
            <label for="status">Trạng thái</label>
            <select id="status" name="status" class="form-control" required>
                <option value="draft" @selected(old('status', $experience->status ?: 'draft') === 'draft')>Bản nháp</option>
                <option value="published" @selected(old('status', $experience->status) === 'published')>Đã xuất bản</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="image">Hình ảnh</label>
        <input id="image" type="file" name="image" class="form-control-file" accept="image/*">
        @if($experience->image)
            @php
                $imageUrl = \Illuminate\Support\Str::startsWith($experience->image, ['http://', 'https://', 'images/'])
                    ? asset($experience->image)
                    : asset('storage/'.$experience->image);
            @endphp
            <div class="mt-2">
                <img src="{{ $imageUrl }}" alt="{{ $experience->title }}" style="max-width: 180px; border-radius: 4px;">
                <div class="text-muted small">Tải ảnh mới để thay ảnh hiện tại.</div>
            </div>
        @endif
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="{{ route('admin.experiences.index') }}" class="btn btn-secondary">Hủy</a>
</div>
