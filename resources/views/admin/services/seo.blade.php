<fieldset class="border rounded p-3 my-3">
    <legend>{{ __('service_seo.settings') }}</legend>
    @foreach(config('service_seo.locales') as $seoLocale)
        <div class="mb-3">
            <h3 class="fs-5">{{ strtoupper($seoLocale) }}</h3>
            <label for="og_title_{{ $seoLocale }}">{{ __('service_seo.og_title') }}</label>
            <input class="form-control" id="og_title_{{ $seoLocale }}" name="og_title_{{ $seoLocale }}" maxlength="255"
                value="{{ old('og_title_'.$seoLocale, isset($data) ? $data->getAttribute('og_title_'.$seoLocale) : '') }}">
            <label for="og_description_{{ $seoLocale }}">{{ __('service_seo.og_description') }}</label>
            <textarea class="form-control" id="og_description_{{ $seoLocale }}" name="og_description_{{ $seoLocale }}" maxlength="2000" rows="3">{{ old('og_description_'.$seoLocale, isset($data) ? $data->getAttribute('og_description_'.$seoLocale) : '') }}</textarea>
        </div>
    @endforeach
    <label for="og_image">{{ __('service_seo.og_image') }}</label>
    <input type="file" class="form-control" id="og_image" name="og_image" accept="image/jpeg,image/png,image/webp,image/gif">
    @if(isset($data) && $data->og_image)
        <img class="my-2" width="200" src="{{ asset('assets/images/services/'.$data->og_image) }}" alt="{{ __('service_seo.og_image') }}">
    @endif
    <label class="mt-3" for="is_published">{{ __('service_seo.status') }}</label>
    <select class="form-control" id="is_published" name="is_published">
        <option value="1" @selected(old('is_published', $data->is_published ?? true))>{{ __('service_seo.published') }}</option>
        <option value="0" @selected(!old('is_published', $data->is_published ?? true))>{{ __('service_seo.draft') }}</option>
    </select>
</fieldset>
