@extends('layouts.master')
@section('title') Forms @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Website Content @endslot
        @slot('title') Forms @endslot
    @endcomponent

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">@include('includes.admin.form-success')</div>
            <div class="card-body">
                <table id="geniustable" class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Key</th>
                            <th>Fields</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    var table = $('#geniustable').DataTable({
        ordering: false, processing: true, serverSide: true,
        ajax: '{{ route('admin-forms-datatables') }}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'key', name: 'key' },
            { data: 'fields_count', name: 'fields_count', searchable: false },
            { data: 'status', name: 'status', searchable: false },
            { data: 'action', searchable: false, orderable: false }
        ],
        language: { processing: '<img src="{{ asset('assets/images/'.$gs->admin_loader) }}">' }
    });
</script>
@endsection
