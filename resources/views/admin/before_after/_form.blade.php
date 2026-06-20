@php $data = $data ?? null; @endphp
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Service <span class="text-danger">*</span></label>
        <select class="form-control" name="service_id" required>
            <option value="">-- Select service --</option>
            @foreach($services as $s)
                <option value="{{ $s->id }}" @selected((int) old('service_id', $data->service_id ?? request('service_id')) === (int) $s->id)>
                    {{ $s->title_ar ?: $s->title_en }}
                </option>
            @endforeach
        </select>
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
        <label class="form-label">Before Image @if(!$data)<span class="text-danger">*</span>@endif</label>
        <input type="file" class="form-control" name="before_photo" accept="image/png, image/jpeg, image/gif, image/webp" @if(!$data) required @endif>
        @if($data && $data->before_photo)
            <div class="mt-2"><img src="{{ $data->before_photo }}" style="width:120px;height:90px;object-fit:cover"></div>
        @endif
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">After Image @if(!$data)<span class="text-danger">*</span>@endif</label>
        <input type="file" class="form-control" name="after_photo" accept="image/png, image/jpeg, image/gif, image/webp" @if(!$data) required @endif>
        @if($data && $data->after_photo)
            <div class="mt-2"><img src="{{ $data->after_photo }}" style="width:120px;height:90px;object-fit:cover"></div>
        @endif
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Before Image Alt Text</label>
        <input type="text" class="form-control" name="before_alt" value="{{ old('before_alt', $data->before_alt ?? '') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">After Image Alt Text</label>
        <input type="text" class="form-control" name="after_alt" value="{{ old('after_alt', $data->after_alt ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Title (Arabic)</label>
        <input type="text" class="form-control" name="title_ar" value="{{ old('title_ar', $data->title_ar ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Title (English)</label>
        <input type="text" class="form-control" name="title_en" value="{{ old('title_en', $data->title_en ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Title (French)</label>
        <input type="text" class="form-control" name="title_fr" value="{{ old('title_fr', $data->title_fr ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Description (Arabic)</label>
        <textarea class="form-control" name="description_ar" rows="3">{{ old('description_ar', $data->description_ar ?? '') }}</textarea>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Description (English)</label>
        <textarea class="form-control" name="description_en" rows="3">{{ old('description_en', $data->description_en ?? '') }}</textarea>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Description (French)</label>
        <textarea class="form-control" name="description_fr" rows="3">{{ old('description_fr', $data->description_fr ?? '') }}</textarea>
    </div>
</div>
