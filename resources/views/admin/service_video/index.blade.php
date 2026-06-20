@extends('layouts.master')
@section('title') Service Videos @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Website Content @endslot
        @slot('title') Service Videos @endslot
    @endcomponent

    <input type="hidden" id="headerdata" value="Service Video">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">@include('includes.admin.form-success')</div>
            <div class="card-body">
                <table id="geniustable" class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Video set</th>
                            <th>Status</th>
                            <th>Order</th>
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
        ajax: '{{ route('admin-service-video-datatables') }}',
        columns: [
            { data: 'service_name', name: 'service_name' },
            { data: 'has_video', name: 'has_video', searchable: false },
            { data: 'video_status', name: 'video_status', searchable: false },
            { data: 'video_order', name: 'video_order' },
            { data: 'action', searchable: false, orderable: false }
        ],
        language: { processing: '<img src="{{ asset('assets/images/'.$gs->admin_loader) }}">' }
    });
</script>
@endsection
