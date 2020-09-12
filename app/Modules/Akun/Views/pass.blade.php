@extends('Layout::index')

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Ubah kata sandi</h3>
			</div>
			<div class="card-body">
				<form id="fedit">
					<div class="form-group">
	                    <label class="form-label">Kata sandi lama</label>
	                    <input name="password-old" type="password" class="form-control" value="" required>
	                </div>
					<hr class="mb-5 mt-5">
					<div class="form-group">
	                    <label class="form-label">Kata sandi baru</label>
	                    <input name="password" type="password" class="form-control" value="" required>
	                </div>
	                <div class="form-group">
	                    <label class="form-label">Konfirmasi kata sandi</label>
	                    <input name="password_confirmation" type="password" class="form-control" value="" required>
	                </div>
				</form>
			</div>
			<div class="card-footer text-right">
				<div class="d-flex">
					<!-- <a href="javascript:void(0)" class="btn btn-link">Cancel</a> -->
					<button class="btn btn-info ml-auto" id="saveform">Ubah</button>
				</div>
			</div>
		</div>
    </div>
</div>

@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
$('#saveform').on('click', function(e) {
	e.preventDefault

	let route="{{route('akun-data')}}"
	let data='a=edit-pass&id={{Auth::user()->id}}&'
	data+=$("#fedit").serialize()
	let rd=document.referrer

	saverd2(route,data,rd)
})

</script>

@endsection
