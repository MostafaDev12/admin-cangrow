@php $data = $data ?? null; @endphp
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Name (Arabic) <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="name_ar" value="{{ old('name_ar', $data->name_ar ?? '') }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Name (English)</label>
        <input type="text" class="form-control" name="name_en" value="{{ old('name_en', $data->name_en ?? '') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Title / Specialty (Arabic)</label>
        <input type="text" class="form-control" name="title_ar" value="{{ old('title_ar', $data->title_ar ?? '') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Title / Specialty (English)</label>
        <input type="text" class="form-control" name="title_en" value="{{ old('title_en', $data->title_en ?? '') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Short Bio (Arabic)</label>
        <textarea class="form-control" name="bio_ar" rows="3">{{ old('bio_ar', $data->bio_ar ?? '') }}</textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Short Bio (English)</label>
        <textarea class="form-control" name="bio_en" rows="3">{{ old('bio_en', $data->bio_en ?? '') }}</textarea>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Display Order</label>
        <input type="number" class="form-control" name="display_order" value="{{ old('display_order', $data->display_order ?? 0) }}">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label d-block">Status</label>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="active" value="1" @checked(old('active', $data->active ?? 1))>
            <label class="form-check-label">Active</label>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label d-block">Featured</label>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="featured" value="1" @checked(old('featured', $data->featured ?? 0))>
            <label class="form-check-label">Show as a main team member on the About page</label>
        </div>
        <small class="text-muted">Featured doctors appear in the large highlighted card of the team section.</small>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Profile Image</label>
        <input type="file" class="form-control" name="photo" accept="image/png, image/jpeg, image/gif, image/webp">
        @if($data && $data->photo_url)
            <div class="mt-2"><img src="{{ $data->photo_url }}" style="width:80px;height:80px;border-radius:50%;object-fit:cover"></div>
        @endif
    </div>
</div>
