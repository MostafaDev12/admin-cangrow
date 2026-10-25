<fieldset class="card card-body">
    <legend class="h5">إعدادات SEO والمشاركة</legend>
    <p class="text-muted">عنوان ووصف SEO والرابط موجودة في تبويب كل لغة. يُنصح بعنوان حوالي 60 حرفاً ووصف حوالي 160 حرفاً؛ هذه توصيات وليست حدوداً إلزامية.</p>
    @foreach(['ar' => 'العربية', 'en' => 'English', 'fr' => 'Français'] as $locale => $label)
        <h6>{{ $label }}</h6>
        @foreach(['og_title' => 'عنوان المشاركة', 'og_description' => 'وصف المشاركة'] as $field => $caption)
            <div class="mb-3">
                <label for="{{ $field }}_{{ $locale }}" class="form-label">{{ $caption }}</label>
                <input class="form-control" id="{{ $field }}_{{ $locale }}" name="{{ $field }}_{{ $locale }}" value="{{ old($field.'_'.$locale, isset($data) ? $data->{$field.'_'.$locale} : '') }}">
            </div>
        @endforeach
    @endforeach
    <label for="og_image" class="form-label">صورة المشاركة (اختيارية؛ اتركها للاحتفاظ بالصورة الحالية)</label>
    <input type="file" name="og_image" id="og_image" class="form-control mb-3" accept="image/jpeg,image/png,image/gif,image/webp">
    @if(isset($data) && $data->og_image)
        <img src="{{ asset('assets/images/services/'.$data->og_image) }}" alt="صورة المشاركة الحالية" width="160">
    @endif
    <label for="is_published" class="form-label">حالة النشر</label>
    <select name="is_published" id="is_published" class="form-control">
        <option value="1" @selected(old('is_published', $data->is_published ?? 1) == 1)>منشور</option>
        <option value="0" @selected(old('is_published', $data->is_published ?? 1) == 0)>مسودة / غير منشور</option>
    </select>
</fieldset>
