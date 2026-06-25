@extends('layouts.master')
@section('title') {{ $label }} @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Medical Tourism @endslot
        @slot('title') {{ $label }}s @endslot
    @endcomponent

    <input type="hidden" id="headerdata" value="{{ $label }}">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                @include('includes.admin.form-success')
                <a class="btn btn-sm btn-secondary" href="{{ route('admin-mt-blocks-create', $type) }}"><i class="fas fa-plus"></i> Add {{ $label }}</a>
            </div>
            <div class="card-body">
                <table id="geniustable" class="table align-middle table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Icon</th>
                            <th>{{ $type === 'faq' ? 'Question' : 'Title' }}</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @include('admin.partials.delete-modal', ['message' => 'You are about to delete this item.'])
@endsection

@section('script')
<script type="text/javascript">
    var table = $('#geniustable').DataTable({
        ordering: false, processing: true, serverSide: true,
        ajax: '{{ route('admin-mt-blocks-datatables', $type) }}',
        columns: [
            { data: 'display_order', name: 'display_order' },
            { data: 'icon', name: 'icon' },
            { data: 'title', name: 'title', searchable: false },
            { data: 'status', name: 'status', searchable: false },
            { data: 'action', searchable: false, orderable: false }
        ],
        language: { processing: '<img src="{{ asset('assets/images/'.$gs->admin_loader) }}">' }
    });
</script>
@endsection
