@extends('layouts.master')
@section('title') Manage Form @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Forms @endslot
        @slot('title') {{ $data->name ?: $data->key }} @endslot
    @endcomponent

    <input type="hidden" id="headerdata" value="Field">

    {{-- Form settings --}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><h5 class="card-title mb-0">Form Settings</h5></div>
            <div class="card-body">
                <form id="geniusform" action="{{ route('admin-forms-update', $data->id) }}" method="POST">
                    {{ csrf_field() }}
                    @include('includes.admin.form-both')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label d-block">Enable form</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="enabled" value="1" @checked($data->enabled)>
                                <label class="form-check-label">Enabled</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Form source identifier</label>
                            <input type="text" class="form-control" name="source_identifier" value="{{ old('source_identifier', $data->source_identifier) }}">
                        </div>

                        @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $code => $langLabel)
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Heading ({{ $langLabel }})</label>
                                <input type="text" class="form-control" name="heading_{{ $code }}" value="{{ old('heading_'.$code, $data->{'heading_'.$code}) }}">
                            </div>
                        @endforeach

                        @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $code => $langLabel)
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Description ({{ $langLabel }})</label>
                                <textarea class="form-control" name="description_{{ $code }}" rows="2">{{ old('description_'.$code, $data->{'description_'.$code}) }}</textarea>
                            </div>
                        @endforeach

                        @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $code => $langLabel)
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Submit button text ({{ $langLabel }})</label>
                                <input type="text" class="form-control" name="button_text_{{ $code }}" value="{{ old('button_text_'.$code, $data->{'button_text_'.$code}) }}">
                            </div>
                        @endforeach

                        @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $code => $langLabel)
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Success message ({{ $langLabel }})</label>
                                <input type="text" class="form-control" name="success_message_{{ $code }}" value="{{ old('success_message_'.$code, $data->{'success_message_'.$code}) }}">
                            </div>
                        @endforeach
                    </div>
                    <div class="text-end">
                        <button class="addProductSubmit-btn btn btn-secondary" type="submit">Save Settings</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Form fields --}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Fields</h5>
                <a href="{{ route('admin-forms-field-create', $data->id) }}" class="btn btn-sm btn-secondary"><i class="fas fa-plus"></i> Add Field</a>
            </div>
            <div class="card-body">
                <table id="geniustable" class="table align-middle table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Field key</th>
                            <th>Label</th>
                            <th>Type</th>
                            <th>Flags</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    @include('admin.partials.delete-modal', ['message' => 'You are about to delete this field.'])
@endsection

@section('script')
<script type="text/javascript">
    var table = $('#geniustable').DataTable({
        ordering: false, processing: true, serverSide: true,
        ajax: '{{ route('admin-forms-fields-datatables', $data->id) }}',
        columns: [
            { data: 'display_order', name: 'display_order' },
            { data: 'name', name: 'name' },
            { data: 'label', name: 'label', searchable: false },
            { data: 'type', name: 'type' },
            { data: 'flags', name: 'flags', searchable: false },
            { data: 'action', searchable: false, orderable: false }
        ],
        language: { processing: '<img src="{{ asset('assets/images/'.$gs->admin_loader) }}">' }
    });
</script>
@endsection
