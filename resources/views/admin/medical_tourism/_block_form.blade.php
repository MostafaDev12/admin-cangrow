@php $data = $data ?? null; $isFaq = $type === 'faq'; @endphp
<div class="row">
    <div class="col-md-8 mb-3">
        <label class="form-label">{{ $isFaq ? 'Question' : 'Title' }} (Arabic) <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="title_ar" value="{{ old('title_ar', $data->title_ar ?? '') }}" required>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Icon (emoji or fa-class)</label>
        <input type="text" class="form-control" name="icon" value="{{ old('icon', $data->icon ?? '') }}" placeholder="🛡️ or fa-solid fa-tooth">
    </div>
    <div class="col-md-12 mb-3">
        <label class="form-label">{{ $isFaq ? 'Question' : 'Title' }} (English)</label>
        <input type="text" class="form-control" name="title_en" value="{{ old('title_en', $data->title_en ?? '') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">{{ $isFaq ? 'Answer' : 'Description' }} (Arabic)</label>
        <textarea class="form-control" name="description_ar" rows="3">{{ old('description_ar', $data->description_ar ?? '') }}</textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">{{ $isFaq ? 'Answer' : 'Description' }} (English)</label>
        <textarea class="form-control" name="description_en" rows="3">{{ old('description_en', $data->description_en ?? '') }}</textarea>
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
</div>
