@csrf
<div class="card-body">
    <div class="form-group">
        <label for="name">Tên người/đơn vị tổ chức</label>
        <input id="name" name="name" class="form-control" value="{{ old('name', $organizer->name) }}" required>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" class="form-control" value="{{ old('email', $organizer->email) }}">
        </div>
        <div class="form-group col-md-6">
            <label for="phone">Điện thoại</label>
            <input id="phone" name="phone" class="form-control" value="{{ old('phone', $organizer->phone) }}">
        </div>
    </div>

    <div class="form-group">
        <label for="address">Địa chỉ</label>
        <input id="address" name="address" class="form-control" value="{{ old('address', $organizer->address) }}">
    </div>

    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea id="description" name="description" rows="4" class="form-control">{{ old('description', $organizer->description) }}</textarea>
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="{{ route('admin.organizers.index') }}" class="btn btn-secondary">Hủy</a>
</div>
