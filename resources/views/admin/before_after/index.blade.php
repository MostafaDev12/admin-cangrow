@extends('layouts.master')
@section('title') Before & After @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Website Content @endslot
        @slot('title') Before &amp; After Results @endslot
    @endcomponent

    <input type="hidden" id="headerdata" value="Case">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex flex-wrap gap-2 align-items-center justify-content-between">
                @include('includes.admin.form-success')
                <div class="d-flex gap-2 align-items-center">
                    <label class="form-label mb-0">Filter by service:</label>
                    <select id="serviceFilter" class="form-select form-select-sm" style="width:auto">
                        <option value="">All services</option>
                        @foreach($services as $s)
                            <option value="{{ $s->id }}" @selected($serviceId == $s->id)>{{ $s->title_ar ?: $s->title_en }}</option>
                        @endforeach
                    </select>
                </div>
                <a class="btn btn-sm btn-secondary" href="{{ route('admin-before-after-create') }}"><i class="fas fa-plus"></i> Add Case</a>
            </div>
            <div class="card-body">
                <table id="geniustable" class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Before / After</th>
                            <th>Service</th>
                            <th>Title</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    @include('admin.partials.delete-modal', ['message' => 'You are about to delete this case.'])
@endsection

@section('script')
<script type="text/javascript">
    var table = $('#geniustable').DataTable({
        ordering: false,
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('admin-before-after-datatables') }}',
            data: function (d) { d.service_id = $('#serviceFilter').val(); }
        },
        columns: [
            { data: 'before_photo', name: 'before_photo', searchable: false, orderable: false },
            { data: 'service_name', name: 'service_name', searchable: false },
            { data: 'title_ar', name: 'title_ar' },
            { data: 'display_order', name: 'display_order' },
            { data: 'status', name: 'status', searchable: false },
            { data: 'action', searchable: false, orderable: false }
        ],
        language: { processing: '<img src="{{ asset('assets/images/'.$gs->admin_loader) }}">' }
    });
    $('#serviceFilter').on('change', function(){ table.ajax.reload(); });
</script>
@endsection
