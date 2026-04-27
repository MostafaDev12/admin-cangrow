@extends('layouts.master')
@section('title')
    Pages
@endsection
@section('css')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Dashboards
        @endslot
        @slot('title')
            Pages
        @endslot
    @endcomponent

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                @include('includes.admin.form-success')
                <h5 class="card-title mb-0">Manage Pages</h5>
                <p class="text-muted small mb-0 mt-1">Pages are seeded by <code>BekdashPageSeeder</code>. To add or remove a page, update the seeder and the route whitelist in <code>routes/front.php</code>.</p>
            </div>
            <div class="card-body">
                <table id="geniustable" class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Slug</th>
                            <th>Template</th>
                            <th>Published</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        var table = $('#geniustable').DataTable({
            ordering: false,
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin-pages-datatables') }}",
            columns: [
                { data: 'slug',               name: 'slug' },
                { data: 'template',           name: 'template' },
                { data: 'is_published_label', name: 'is_published_label' },
                { data: 'updated_at_human',   name: 'updated_at_human' },
                { data: 'action', searchable: false, orderable: false }
            ],
            language: {
                processing: '<img src="{{ asset('assets/images/'.$gs->admin_loader) }}">'
            }
        });
    </script>
@endsection
