@extends('layouts.master')
@section('title') Add {{ $label }} @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Medical Tourism @endslot
        @slot('title') Add {{ $label }} @endslot
    @endcomponent
    <div class="col-lg-12"><div class="card"><div class="card-body">
        <form id="geniusform" action="{{ route('admin-mt-blocks-store', $type) }}" method="POST">
            {{ csrf_field() }}
            @include('includes.admin.form-both')
            @include('admin.medical_tourism._block_form')
            <div class="text-end">
                <a href="{{ route('admin-mt-blocks-index', $type) }}" class="btn btn-light">Back</a>
                <button class="addProductSubmit-btn btn btn-secondary" type="submit">Save</button>
            </div>
        </form>
    </div></div></div>
@endsection
