@extends('layouts.master')
@section('title') Edit Service Video @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Service Videos @endslot
        @slot('title') Video: {{ $data->title_ar ?: $data->title_en }} @endslot
    @endcomponent

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form id="geniusform" action="{{ route('admin-service-video-update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include('includes.admin.form-both')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label d-block">Enable video section</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="video_enabled" value="1" @checked($data->video_enabled)>
                                <label class="form-check-label">Enabled</label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Display Order</label>
                            <input type="number" class="form-control" name="video_order" value="{{ old('video_order', $data->video_order) }}">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">YouTube Video URL</label>
                            <input type="text" class="form-control" name="youtube_video_url" value="{{ old('youtube_video_url', $data->youtube_video_url) }}"
                                placeholder="https://www.youtube.com/watch?v=...  |  https://youtu.be/...  |  embed link">
                            <small class="text-muted">Accepts watch, youtu.be, embed and shorts links. Converted automatically.</small>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Badge text (Arabic)</label>
                            <input type="text" class="form-control" name="video_badge_ar" value="{{ old('video_badge_ar', $data->video_badge_ar) }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Badge text (English)</label>
                            <input type="text" class="form-control" name="video_badge_en" value="{{ old('video_badge_en', $data->video_badge_en) }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Badge text (French)</label>
                            <input type="text" class="form-control" name="video_badge_fr" value="{{ old('video_badge_fr', $data->video_badge_fr) }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Heading (Arabic)</label>
                            <input type="text" class="form-control" name="video_heading_ar" value="{{ old('video_heading_ar', $data->video_heading_ar) }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Heading (English)</label>
                            <input type="text" class="form-control" name="video_heading_en" value="{{ old('video_heading_en', $data->video_heading_en) }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Heading (French)</label>
                            <input type="text" class="form-control" name="video_heading_fr" value="{{ old('video_heading_fr', $data->video_heading_fr) }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Description (Arabic)</label>
                            <textarea class="form-control" name="video_description_ar" rows="3">{{ old('video_description_ar', $data->video_description_ar) }}</textarea>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Description (English)</label>
                            <textarea class="form-control" name="video_description_en" rows="3">{{ old('video_description_en', $data->video_description_en) }}</textarea>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Description (French)</label>
                            <textarea class="form-control" name="video_description_fr" rows="3">{{ old('video_description_fr', $data->video_description_fr) }}</textarea>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Button text (Arabic)</label>
                            <input type="text" class="form-control" name="video_button_text_ar" value="{{ old('video_button_text_ar', $data->video_button_text_ar) }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Button text (English)</label>
                            <input type="text" class="form-control" name="video_button_text_en" value="{{ old('video_button_text_en', $data->video_button_text_en) }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Button text (French)</label>
                            <input type="text" class="form-control" name="video_button_text_fr" value="{{ old('video_button_text_fr', $data->video_button_text_fr) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Button link (optional)</label>
                            <input type="text" class="form-control" name="video_button_link" value="{{ old('video_button_link', $data->video_button_link) }}"
                                placeholder="Leave empty to open the booking modal">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Video title (accessibility)</label>
                            <input type="text" class="form-control" name="video_title" value="{{ old('video_title', $data->video_title) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Custom thumbnail (optional)</label>
                            <input type="file" class="form-control" name="video_thumbnail" accept="image/png, image/jpeg, image/gif, image/webp">
                            @if($data->video_thumbnail_url)
                                <div class="mt-2"><img src="{{ $data->video_thumbnail_url }}" style="width:160px;height:90px;object-fit:cover"></div>
                            @endif
                        </div>
                    </div>

                    <div class="text-end">
                        <button class="addProductSubmit-btn btn btn-secondary" type="submit">Save Video Settings</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
