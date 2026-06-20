@php $data = $data ?? null; @endphp
<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">Field key (name) <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $data->name ?? '') }}" required
            placeholder="e.g. name, phone, email, city, country, treatment, message">
        <small class="text-muted">Letters, numbers and underscore only.</small>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Type <span class="text-danger">*</span></label>
        <select class="form-control" name="type" required>
            @foreach(['text', 'email', 'tel', 'textarea', 'date', 'select'] as $t)
                <option value="{{ $t }}" @selected(old('type', $data->type ?? 'text') === $t)>{{ $t }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Display order</label>
        <input type="number" class="form-control" name="display_order" value="{{ old('display_order', $data->display_order ?? 0) }}">
    </div>

    @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $code => $langLabel)
        <div class="col-md-4 mb-3">
            <label class="form-label">Label ({{ $langLabel }})</label>
            <input type="text" class="form-control" name="label_{{ $code }}" value="{{ old('label_'.$code, $data->{'label_'.$code} ?? '') }}">
        </div>
    @endforeach

    @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $code => $langLabel)
        <div class="col-md-4 mb-3">
            <label class="form-label">Placeholder ({{ $langLabel }})</label>
            <input type="text" class="form-control" name="placeholder_{{ $code }}" value="{{ old('placeholder_'.$code, $data->{'placeholder_'.$code} ?? '') }}">
        </div>
    @endforeach

    <div class="col-md-6 mb-3">
        <label class="form-label">Options (for select, one per line)</label>
        <textarea class="form-control" name="options" rows="3" placeholder='["Option A","Option B"] or one per line'>{{ old('options', $data->options ?? '') }}</textarea>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label d-block">Visible</label>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="visible" value="1" @checked(old('visible', $data->visible ?? 1))>
            <label class="form-check-label">Show field</label>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label d-block">Required</label>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="required" value="1" @checked(old('required', $data->required ?? 0))>
            <label class="form-check-label">Required</label>
        </div>
    </div>
</div>
