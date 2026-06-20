@extends('layouts.master')
@section('title') Add Field @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Forms @endslot
        @slot('title') Add Field — {{ $form->name ?: $form->key }} @endslot
    @endcomponent
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form id="geniusform" action="{{ route('admin-forms-field-store', $form->id) }}" method="POST">
                    {{ csrf_field() }}
                    @include('includes.admin.form-both')
                    @include('admin.forms._field_form')
                    <div class="text-end">
                        <a href="{{ route('admin-forms-edit', $form->id) }}" class="btn btn-light">Back</a>
                        <button class="addProductSubmit-btn btn btn-secondary" type="submit">Save Field</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
