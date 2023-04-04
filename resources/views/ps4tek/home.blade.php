@extends('layouts.layout')

@section('content')
    <div class="container">
        <h2 class="m-3">Hillo..</h2>
        <h3 class="m-3"><a class="btn btn-success" href="{{route('migrate') }}">{{ __('base.first_make_migrations') }}</a></h3>
        <h3 class="m-3">
            <form class="forms-sample" method="POST" action="{{ route('genrate_data') }}" enctype="multipart/form-data">
                @csrf
                <div class="form__actions cms-buttons-bottom">
                    <button type="submit" class="btn m-btn--air btn-success mx-1">{{ __('base.second_genrate_data') }}</button>
                </div>
            </form>
        </h3>
        <h3 class="m-3"><a class="btn btn-info" href="{{route('index') }}">{{ __('base.show_data') }}</a></h3>
    </div>
@endsection

@push('styles')
    <style>
      /*  */
    </style>
@endpush

@push('scripts')
    <script>
        //
    </script>
@endpush
