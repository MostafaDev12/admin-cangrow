@extends('layouts.master')
@section('title') Lead Details @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Leads @endslot
        @slot('title') Lead #{{ $data->id }} @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header"><h5 class="card-title mb-0">Submission</h5></div>
                <div class="card-body">
                    <table class="table table-bordered align-middle mb-0">
                        <tr><th style="width:35%">Date</th><td>{{ $data->created_at }}</td></tr>
                        <tr><th>Source</th><td>{{ $data->source_label }} <code class="ms-1">{{ $data->form_key }}</code></td></tr>
                        <tr><th>Source page</th><td><a href="{{ $data->source_page }}" target="_blank">{{ \Illuminate\Support\Str::limit($data->source_page, 60) }}</a></td></tr>
                        <tr><th>Related service</th><td>{{ $data->service->title_ar ?? $data->service->title_en ?? '—' }}</td></tr>
                        <tr><th>Name</th><td>{{ $data->name }}</td></tr>
                        <tr><th>Phone</th><td dir="ltr">{{ $data->phone }}</td></tr>
                        <tr><th>Email</th><td>{{ $data->email }}</td></tr>
                        <tr><th>City</th><td>{{ $data->city }}</td></tr>
                        <tr><th>Country</th><td>{{ $data->country }}</td></tr>
                        <tr><th>Subject</th><td>{{ $data->subject }}</td></tr>
                        <tr><th>Treatment</th><td>{{ $data->treatment }}</td></tr>
                        <tr><th>Preferred date</th><td>{{ $data->preferred_date }}</td></tr>
                        <tr><th>Message</th><td>{{ $data->message }}</td></tr>
                        @if($data->payload)
                            <tr><th>Extra fields</th><td>
                                @foreach($data->payload as $k => $v)
                                    <div><strong>{{ $k }}:</strong> {{ is_array($v) ? json_encode($v) : $v }}</div>
                                @endforeach
                            </td></tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card">
                <div class="card-header"><h5 class="card-title mb-0">Manage</h5></div>
                <div class="card-body">
                    <form id="geniusform" action="{{ route('admin-leads-update', $data->id) }}" method="POST">
                        {{ csrf_field() }}
                        @include('includes.admin.form-both')
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="status">
                                @foreach($statuses as $st)
                                    <option value="{{ $st }}" @selected($data->status === $st)>{{ ucfirst($st) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Internal admin notes</label>
                            <textarea class="form-control" name="admin_notes" rows="5">{{ $data->admin_notes }}</textarea>
                        </div>
                        <div class="text-end">
                            <a href="{{ route('admin-leads-index') }}" class="btn btn-light">Back</a>
                            <button class="addProductSubmit-btn btn btn-secondary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
