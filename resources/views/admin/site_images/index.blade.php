@extends('layouts.master')
@section('title')
    Site Images
@endsection
@section('css')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Dashboards
        @endslot
        @slot('title')
            Site Images
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Manage Frontend Images</h5>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin-site_images-update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="accordion" id="siteImagesAccordion">
                            @foreach ($images as $section => $sectionImages)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading-{{ $section }}">
                                        <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse-{{ $section }}"
                                            aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                            aria-controls="collapse-{{ $section }}">
                                            {{ $sectionLabels[$section] ?? ucfirst(str_replace('_', ' ', $section)) }}
                                            <span class="badge bg-secondary ms-2">{{ count($sectionImages) }}</span>
                                        </button>
                                    </h2>
                                    <div id="collapse-{{ $section }}"
                                        class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                        aria-labelledby="heading-{{ $section }}"
                                        data-bs-parent="#siteImagesAccordion">
                                        <div class="accordion-body">
                                            <div class="table-responsive">
                                                <table class="table align-middle table-bordered">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th style="width: 200px;">Label</th>
                                                            <th style="width: 120px;">Current Image</th>
                                                            <th>Upload New</th>
                                                            <th style="width: 120px;">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($sectionImages as $image)
                                                            <tr>
                                                                <td>
                                                                    <strong>{{ $image->label }}</strong>
                                                                    <br>
                                                                    <small class="text-muted">{{ $image->key }}</small>
                                                                </td>
                                                                <td>
                                                                    <img src="{{ asset('front/mtc/' . $image->path) }}"
                                                                        alt="{{ $image->label }}"
                                                                        style="max-width: 100px; max-height: 80px; object-fit: contain; background: #f3f3f9; border-radius: 4px; padding: 4px;">
                                                                </td>
                                                                <td>
                                                                    <input type="file" name="image_{{ $image->id }}"
                                                                        class="form-control form-control-sm"
                                                                        accept="image/*">
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('admin-site_images-reset', $image->id) }}"
                                                                        class="btn btn-sm btn-warning"
                                                                        onclick="return confirm('Reset this image to its default?')">
                                                                        <i class="las la-undo"></i> Reset
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="las la-save"></i> Save All Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
