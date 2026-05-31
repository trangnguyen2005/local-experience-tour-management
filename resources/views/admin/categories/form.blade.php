@csrf
<div class="card-body">
    <div class="form-group">
        <label for="name">Tên loại</label>
        <input id="name" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
    </div>

    <div class="form-group">
        <label for="slug">Slug</label>
        <input id="slug" name="slug" class="form-control" value="{{ old('slug', $category->slug) }}" required>
    </div>

    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea id="description" name="description" rows="4" class="form-control">{{ old('description', $category->description) }}</textarea>
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Hủy</a>
</div>
