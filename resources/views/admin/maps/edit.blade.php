@extends('layouts.master')
@section('title') Edit Map @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Maps @endslot
        @slot('title') {{ $label }} @endslot
    @endcomponent

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form id="geniusform" action="{{ route('admin-maps-update', $data->page_key) }}" method="POST">
                    {{ csrf_field() }}
                    @include('includes.admin.form-both')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label d-block">Enable map</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="enabled" value="1" @checked($data->enabled)>
                                <label class="form-check-label">Enabled</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Clinic name</label>
                            <input type="text" class="form-control" name="clinic_name" value="{{ old('clinic_name', $data->clinic_name) }}">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Google Maps embed URL</label>
                            <input type="text" class="form-control" name="embed_url" value="{{ old('embed_url', $data->embed_url) }}"
                                placeholder="https://www.google.com/maps?q=...&output=embed">
                            <small class="text-muted">Must be a Google Maps URL. Used as the iframe source.</small>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">"Open in Google Maps" link</label>
                            <input type="text" class="form-control" name="direct_link" value="{{ old('direct_link', $data->direct_link) }}"
                                placeholder="https://maps.app.goo.gl/...">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Map title (accessibility)</label>
                            <input type="text" class="form-control" name="map_title" value="{{ old('map_title', $data->map_title) }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Latitude</label>
                            <input type="text" class="form-control" name="latitude" value="{{ old('latitude', $data->latitude) }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Longitude</label>
                            <input type="text" class="form-control" name="longitude" value="{{ old('longitude', $data->longitude) }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Address (Arabic)</label>
                            <textarea class="form-control" name="address_ar" rows="2">{{ old('address_ar', $data->address_ar) }}</textarea>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Address (English)</label>
                            <textarea class="form-control" name="address_en" rows="2">{{ old('address_en', $data->address_en) }}</textarea>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Address (French)</label>
                            <textarea class="form-control" name="address_fr" rows="2">{{ old('address_fr', $data->address_fr) }}</textarea>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Button text (Arabic)</label>
                            <input type="text" class="form-control" name="button_text_ar" value="{{ old('button_text_ar', $data->button_text_ar) }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Button text (English)</label>
                            <input type="text" class="form-control" name="button_text_en" value="{{ old('button_text_en', $data->button_text_en) }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Button text (French)</label>
                            <input type="text" class="form-control" name="button_text_fr" value="{{ old('button_text_fr', $data->button_text_fr) }}">
                        </div>
                    </div>

                    <div class="text-end">
                        <button class="addProductSubmit-btn btn btn-secondary" type="submit">Save Map</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
