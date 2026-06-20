@php $data = $data ?? null; @endphp
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Customer Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $data->name ?? '') }}" required>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Rating (1-5) <span class="text-danger">*</span></label>
        <select class="form-control" name="rating" required>
            @for($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}" @selected((int) old('rating', $data->rating ?? 5) === $i)>{{ $i }}</option>
            @endfor
        </select>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Display Order</label>
        <input type="number" class="form-control" name="display_order" value="{{ old('display_order', $data->display_order ?? 0) }}">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Treatment / Service</label>
        <input type="text" class="form-control" name="service_name" value="{{ old('service_name', $data->service_name ?? '') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">City / Country</label>
        <input type="text" class="form-control" name="location" value="{{ old('location', $data->location ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Review (Arabic)</label>
        <textarea class="form-control" name="review_ar" rows="3">{{ old('review_ar', $data->review_ar ?? '') }}</textarea>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Review (English)</label>
        <textarea class="form-control" name="review_en" rows="3">{{ old('review_en', $data->review_en ?? '') }}</textarea>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Review (French)</label>
        <textarea class="form-control" name="review_fr" rows="3">{{ old('review_fr', $data->review_fr ?? '') }}</textarea>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Avatar (optional)</label>
        <input type="file" class="form-control" name="photo" accept="image/png, image/jpeg, image/gif, image/webp">
        <small class="text-muted">If no image is uploaded, the frontend shows the customer's initial.</small>
        @if($data && $data->photo_url)
            <div class="mt-2"><img src="{{ $data->photo_url }}" style="width:70px;height:70px;border-radius:50%;object-fit:cover"></div>
        @endif
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label d-block">Status</label>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="active" value="1" @checked(old('active', $data->active ?? 1))>
            <label class="form-check-label">Active</label>
        </div>
    </div>
</div>
