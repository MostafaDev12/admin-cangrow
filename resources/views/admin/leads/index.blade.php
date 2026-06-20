@extends('layouts.master')
@section('title') Leads @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Leads @endslot
        @slot('title')
            @switch($group)
                @case('service') Service Leads @break
                @case('contact') Contact Leads @break
                @case('medical_tourism') Medical Tourism Leads @break
                @case('homepage') Homepage Leads @break
                @default All Leads
            @endswitch
        @endslot
    @endcomponent

    <input type="hidden" id="headerdata" value="Lead">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                @include('includes.admin.form-success')
                <div class="row g-2 mt-1">
                    <div class="col-md-2"><input type="text" id="f_name" class="form-control form-control-sm" placeholder="Name"></div>
                    <div class="col-md-2"><input type="text" id="f_phone" class="form-control form-control-sm" placeholder="Phone"></div>
                    <div class="col-md-2">
                        <select id="f_status" class="form-select form-select-sm">
                            <option value="">All statuses</option>
                            @foreach($statuses as $st)
                                <option value="{{ $st }}">{{ ucfirst($st) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select id="f_service" class="form-select form-select-sm">
                            <option value="">All services</option>
                            @foreach($services as $s)
                                <option value="{{ $s->id }}">{{ $s->title_ar ?: $s->title_en }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2"><input type="date" id="f_date_from" class="form-control form-control-sm" title="From date"></div>
                    <div class="col-md-2"><input type="date" id="f_date_to" class="form-control form-control-sm" title="To date"></div>
                </div>
            </div>
            <div class="card-body">
                <table id="geniustable" class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Source</th>
                            <th>Service</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    @include('admin.partials.delete-modal', ['message' => 'You are about to delete this lead.'])
@endsection

@section('script')
<script type="text/javascript">
    var table = $('#geniustable').DataTable({
        ordering: false, processing: true, serverSide: true,
        ajax: {
            url: '{{ route('admin-leads-datatables') }}',
            data: function (d) {
                d.group = '{{ $group }}';
                d.f_name = $('#f_name').val();
                d.f_phone = $('#f_phone').val();
                d.f_status = $('#f_status').val();
                d.f_service = $('#f_service').val();
                d.f_date_from = $('#f_date_from').val();
                d.f_date_to = $('#f_date_to').val();
            }
        },
        columns: [
            { data: 'created_at', name: 'created_at' },
            { data: 'source', name: 'source', searchable: false },
            { data: 'service_name', name: 'service_name', searchable: false },
            { data: 'name', name: 'name' },
            { data: 'phone', name: 'phone' },
            { data: 'email', name: 'email' },
            { data: 'city', name: 'city' },
            { data: 'status_badge', name: 'status_badge', searchable: false },
            { data: 'action', searchable: false, orderable: false }
        ],
        language: { processing: '<img src="{{ asset('assets/images/'.$gs->admin_loader) }}">' }
    });

    $('#f_name, #f_phone').on('keyup', function(){ table.ajax.reload(); });
    $('#f_status, #f_service, #f_date_from, #f_date_to').on('change', function(){ table.ajax.reload(); });
</script>
@endsection
