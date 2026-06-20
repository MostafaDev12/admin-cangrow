@extends('layouts.master')
@section('title') Edit Case @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Before &amp; After @endslot
        @slot('title') Edit Case @endslot
    @endcomponent
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form id="geniusform" action="{{ route('admin-before-after-update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include('includes.admin.form-both')
                    @include('admin.before_after._form', ['data' => $data])
                    <div class="text-end">
                        <button class="addProductSubmit-btn btn btn-secondary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
