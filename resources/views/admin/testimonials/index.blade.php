@extends('layouts.master')
@section('title') Testimonials @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Website Content @endslot
        @slot('title') Testimonials @endslot
    @endcomponent

    <input type="hidden" id="headerdata" value="Testimonial">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                @include('includes.admin.form-success')
                <div class="btn-area"></div>
            </div>
            <div class="card-body">
                <table id="geniustable" class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Rating</th>
                            <th>Service</th>
                            <th>Location</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    @include('admin.partials.delete-modal', ['message' => 'You are about to delete this testimonial.'])
@endsection

@section('script')
<script type="text/javascript">
    var table = $('#geniustable').DataTable({
        ordering: false,
        processing: true,
        serverSide: true,
        ajax: '{{ route('admin-testimonials-datatables') }}',
        columns: [
            { data: 'photo', name: 'photo', searchable: false, orderable: false },
            { data: 'name', name: 'name' },
            { data: 'rating_stars', name: 'rating_stars', searchable: false },
            { data: 'service_name', name: 'service_name' },
            { data: 'location', name: 'location' },
            { data: 'display_order', name: 'display_order' },
            { data: 'status', name: 'status', searchable: false },
            { data: 'action', searchable: false, orderable: false }
        ],
        language: { processing: '<img src="{{ asset('assets/images/'.$gs->admin_loader) }}">' }
    });

    $(function() {
        $(".btn-area").append('<div class="col-sm-4 table-contents">'+
            '<a class="add-btn btn btn-sm btn-secondary" href="{{ route('admin-testimonials-create') }}">'+
            '<i class="fas fa-plus"></i> Add Testimonial</a></div>');
    });
</script>
@endsection
