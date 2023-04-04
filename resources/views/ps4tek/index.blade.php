@extends('layouts.layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-fileinput/bootstrap-fileinput.css') }}">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendors/bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>
@endpush

@section('cms-component')
    {{--  --}}
@endsection

@section('content')

<div class="container">
    <div class="cms-buttons-">
        <div class="actions-component">
            <a class="btn btn-success" href="javascript:;" id="refreshDataTable">{{ __('base.refresh') }}</a>
        </div>
    </div>

    <table class="table table-bordered data-table display nowrap" id="data-table"  cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>{{ __('base.data.id') }}</th>
                <th>{{ __('base.data.email') }}</th>
                <th>{{ __('base.data.title') }}</th>
                <th>{{ __('base.data.description') }}</th>
                <th>{{ __('base.data.created_at') }}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/datatables/datatables.bundle.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('vendors/datatables/datatables.bundle.js') }}"></script>
@endpush

@endsection

@push('styles')
    <style>
    .cms-buttons-{
        position: absolute;
    }
    </style>
@endpush
@push('scripts')
<script>
    $(function() {
        $.extend(options, {
            ajax: {
                url : "{!! route('data::index_data') !!}",
                method: "GET",
                data : {},
            },
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'title',
                    name: 'title',
                },
                {
                    data: 'description',
                    name: 'description',
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                },
            ],
        });
        var table = $('.data-table').DataTable(options);
        $("#refreshDataTable").on("click", function (e) {
            e.preventDefault(), table.ajax.reload();
        });
    });
  </script>
@endpush
