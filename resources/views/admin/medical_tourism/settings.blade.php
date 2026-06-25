@extends('layouts.master')
@section('title') Medical Tourism Settings @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Medical Tourism @endslot
        @slot('title') Page Settings &amp; SEO @endslot
    @endcomponent

    <div class="col-lg-12">
        <div class="card"><div class="card-body">
            <form id="geniusform" action="{{ route('admin-mt-settings-update') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('includes.admin.form-both')

                <div class="form-check form-switch mb-4">
                    <input class="form-check-input" type="checkbox" name="enabled" value="1" @checked($data->enabled)>
                    <label class="form-check-label">Page enabled</label>
                </div>

                <h5 class="mb-3">Hero</h5>
                <div class="row">
                    @foreach(['ar' => 'Arabic', 'en' => 'English'] as $c => $l)
                        <div class="col-md-6 mb-3"><label class="form-label">Badge ({{ $l }})</label>
                            <input type="text" class="form-control" name="hero_badge_{{ $c }}" value="{{ $data->{'hero_badge_'.$c} }}"></div>
                        <div class="col-md-6 mb-3"><label class="form-label">Heading ({{ $l }})</label>
                            <input type="text" class="form-control" name="hero_heading_{{ $c }}" value="{{ $data->{'hero_heading_'.$c} }}"></div>
                        <div class="col-md-6 mb-3"><label class="form-label">Highlight line ({{ $l }})</label>
                            <input type="text" class="form-control" name="hero_highlight_{{ $c }}" value="{{ $data->{'hero_highlight_'.$c} }}"></div>
                        <div class="col-md-6 mb-3"><label class="form-label">Description ({{ $l }})</label>
                            <textarea class="form-control" name="hero_description_{{ $c }}" rows="2">{{ $data->{'hero_description_'.$c} }}</textarea></div>
                    @endforeach
                    <div class="col-md-6 mb-3"><label class="form-label">Hero image</label>
                        <input type="file" class="form-control" name="hero_image" accept="image/*">
                        @if($data->imageUrl('hero_image'))<div class="mt-2"><img src="{{ $data->imageUrl('hero_image') }}" style="height:80px"></div>@endif
                    </div>
                </div>

                <hr>
                <h5 class="mb-3">Section headings</h5>
                <div class="row">
                    @php
                        $headingFields = [
                            'benefits_heading' => 'Benefits heading',
                            'treatments_heading' => 'Treatments heading',
                            'treatments_subheading' => 'Treatments subheading',
                            'journey_heading' => 'Journey heading',
                            'support_heading' => 'Support heading',
                            'beforeafter_heading' => 'Before/After heading',
                            'testimonials_heading' => 'Testimonials heading',
                            'faq_heading' => 'FAQ heading',
                        ];
                    @endphp
                    @foreach($headingFields as $f => $label)
                        <div class="col-md-6 mb-3"><label class="form-label">{{ $label }} (AR)</label>
                            <input type="text" class="form-control" name="{{ $f }}_ar" value="{{ $data->{$f.'_ar'} }}"></div>
                        <div class="col-md-6 mb-3"><label class="form-label">{{ $label }} (EN)</label>
                            <input type="text" class="form-control" name="{{ $f }}_en" value="{{ $data->{$f.'_en'} }}"></div>
                    @endforeach
                    <div class="col-md-6 mb-3"><label class="form-label">Journey description (AR)</label>
                        <textarea class="form-control" name="journey_description_ar" rows="2">{{ $data->journey_description_ar }}</textarea></div>
                    <div class="col-md-6 mb-3"><label class="form-label">Journey description (EN)</label>
                        <textarea class="form-control" name="journey_description_en" rows="2">{{ $data->journey_description_en }}</textarea></div>
                    <div class="col-md-6 mb-3"><label class="form-label">Support description (AR)</label>
                        <textarea class="form-control" name="support_description_ar" rows="2">{{ $data->support_description_ar }}</textarea></div>
                    <div class="col-md-6 mb-3"><label class="form-label">Support description (EN)</label>
                        <textarea class="form-control" name="support_description_en" rows="2">{{ $data->support_description_en }}</textarea></div>
                </div>

                <hr>
                <h5 class="mb-3">Final CTA</h5>
                <div class="row">
                    @foreach(['ar' => 'Arabic', 'en' => 'English'] as $c => $l)
                        <div class="col-md-6 mb-3"><label class="form-label">CTA heading ({{ $l }})</label>
                            <input type="text" class="form-control" name="final_cta_heading_{{ $c }}" value="{{ $data->{'final_cta_heading_'.$c} }}"></div>
                        <div class="col-md-6 mb-3"><label class="form-label">CTA description ({{ $l }})</label>
                            <textarea class="form-control" name="final_cta_description_{{ $c }}" rows="2">{{ $data->{'final_cta_description_'.$c} }}</textarea></div>
                        <div class="col-md-6 mb-3"><label class="form-label">CTA button text ({{ $l }})</label>
                            <input type="text" class="form-control" name="final_cta_button_{{ $c }}" value="{{ $data->{'final_cta_button_'.$c} }}"></div>
                    @endforeach
                    <div class="col-md-6 mb-3"><label class="form-label">Final CTA image</label>
                        <input type="file" class="form-control" name="final_cta_image" accept="image/*">
                        @if($data->imageUrl('final_cta_image'))<div class="mt-2"><img src="{{ $data->imageUrl('final_cta_image') }}" style="height:80px"></div>@endif
                    </div>
                </div>

                <hr>
                <h5 class="mb-3">SEO</h5>
                <div class="row">
                    @foreach(['ar' => 'Arabic', 'en' => 'English'] as $c => $l)
                        <div class="col-md-6 mb-3"><label class="form-label">Meta title ({{ $l }})</label>
                            <input type="text" class="form-control" name="meta_title_{{ $c }}" value="{{ $data->{'meta_title_'.$c} }}"></div>
                        <div class="col-md-6 mb-3"><label class="form-label">Meta description ({{ $l }})</label>
                            <textarea class="form-control" name="meta_description_{{ $c }}" rows="2">{{ $data->{'meta_description_'.$c} }}</textarea></div>
                    @endforeach
                    <div class="col-md-6 mb-3"><label class="form-label">OG image</label>
                        <input type="file" class="form-control" name="og_image" accept="image/*">
                        @if($data->imageUrl('og_image'))<div class="mt-2"><img src="{{ $data->imageUrl('og_image') }}" style="height:80px"></div>@endif
                    </div>
                </div>

                <div class="text-end"><button class="addProductSubmit-btn btn btn-secondary" type="submit">Save Settings</button></div>
            </form>
        </div></div>
    </div>
@endsection
