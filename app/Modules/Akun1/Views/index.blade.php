@extends('Layout::index')

@section('content')
<div class="row">
    <div class="col-xl-12" id="_table">
    </div>
</div>

@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('vendor/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('vendor/dropify/css/dropify.css') }}" rel="stylesheet" media="screen">
@endsection

@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script src="{{ asset('vendor/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendor/dropify/js/dropify.min.js') }}"></script>

<script>
    $('#_table').load("{{ route('akundist-load') }}",'a=_table')
</script>

@endsection
