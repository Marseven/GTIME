@push('styles')
    <style>
        .alert.alert-custom.alert-notice {
            position: absolute;
            top: 85px;
            right: 25px;
        }

    </style>
@endpush

@if ($message = Session::get('success'))
    <div style="position: absolute; top: 85px; right: 25px;" class="alert alert-success alert-dismissible show fade">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('error'))
    <div style="position: absolute; top: 85px; right: 25px;" class="alert alert-danger alert-dismissible show fade">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div style="position: absolute; top: 85px; right: 25px;" class="alert alert-warning alert-dismissible show fade">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('info'))
    <div style="position: absolute; top: 85px; right: 25px;" class="alert alert-info alert-dismissible show fade">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div style="position: absolute; top: 85px; right: 25px;" class="alert alert-danger alert-dismissible show fade">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
