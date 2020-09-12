<form id="fedit">
    @csrf
    <input name="id" type="text" value="{{$user->id}}" hidden>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Peran</label>
					<div class="selectgroup selectgroup-pills">
						@foreach ($roles as $r)
							<label class="selectgroup-item">
								<input type="checkbox" name="roles[]" value="{{$r->id}}" class="selectgroup-input">
								<span class="selectgroup-button">{{$r->name}}
								</span>
							</label>
                        @endforeach
					</div>
                </div>
                <div class="form-group">
                    <label class="form-label">Nama pengguna</label>
                    <input name="username" type="text" class="form-control" value="{{$user->username}}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input name="email" type="text" class="form-control" value="{{$user->email}}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Nama</label>
                    <input name="name" type="text" class="form-control" value="{{$user->name}}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Kata sandi</label>
                    <input name="password" type="password" class="form-control" value="" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Konfirmasi kata sandi</label>
                    <input name="password_confirmation" type="password" class="form-control" value="" required>
                </div>
            </div>
            <div class="modal-footer">
                <span class="btn btn-danger" id="saveform">
                    Ubah
                </span>
                <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</form>

<script>
    $('#saveform').on('click', function(e) {
        e.preventDefault

        let route="{{route('akun-data')}}"
        let data='a=edit&'
        data+=$("#fedit").serialize()
        console.log(data)
        saveform(route,data)
                // swal({
                //     title: 'Apakah Anda Yakin?',
                //     type: 'question',
                //     showCancelButton: true,
                //     confirmButtonText: 'Iya!',
                //     cancelButtonText: 'Batal',
                //     allowOutsideClick: false
                // }).then(function(result) {
                //     if (result.value) {
                //         swal({
                //             title: 'Mohon menunggu',
                //             allowOutsideClick: false,
                //         })
                //         swal.showLoading()
                //
                //         data='a=edit&'
                //         data+=$("#fedit").serialize()
                //         saveusr(data)
                //     }
                // })
    })

    function saveusr(data) {
        $.post("{{ route('akun-data') }}", data, function(r) {
            swal({
                type: 'success',
                title: 'Data berhasil disimpan',
                showConfirmButton: false,
                timer: 1500
            })
            $('#modal').modal('hide')
            $('#list').DataTable().ajax.reload(null, false);
        }, 'json').fail(function(response) {
            console.log(response)
            swal(
                'Terjadi Kesalahan!',
                response.responseText,
                // 'Mohon Dicek Kembali',
                'error'
            )
        });
	}

</script>
