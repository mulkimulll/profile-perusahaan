<form id="freg">
    @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Akun baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<div class="form-group">
                    <label class="form-label">Peran</label>
                    <select class="form-control" name="role">
                        <option value="103">Subdistributor</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Nama pengguna</label>
                    <input name="username" type="text" class="form-control" value="" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input name="email" type="text" class="form-control" value="" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Nama</label>
                    <input name="name" type="text" class="form-control" value="" required>
                </div>
                {{-- <div class="form-group">
                    <label class="form-label">Kata sandi</label>
                    <input name="password" type="password" class="form-control" value="" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Konfirmasi kata sandi</label>
                    <input name="password_confirmation" type="password" class="form-control" value="" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Alamat distributor</label>
                    <input name="alamat" type="text" class="form-control" value="" required>
                </div> --}}
                <div class="form-group">
                    <label class="form-label">Foto distributor</label>
                    <input id="foto" type="file" class="dropify" data-allowed-file-extensions="pdf jpg png jpeg"/>		
                </div>

            </div>
            <div class="modal-footer">
                <span class="btn btn-danger" id="saveform">
                    Daftar
                </span>
                <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</form>

<script>
    $('.dropify').dropify({
		messages: {
	        'default': 'Tarik dan jatuhkan gambar di sini atau klik',
	        'replace': 'Tarik dan jatuhkan atau klik untuk mengganti',
	        'remove':  'Hapus',
	        'error':   'Terjadi kesalahan.'
	    },
		error: {
            'fileExtension': 'gambar tidak diperbolehkan, hanya boleh (jpg, png, jpeg).'
        },
	})
    $('#saveform').on('click', function (e) {
        e.preventDefault()

		var role = $( ".role" ).val();
		let id={{$r?$r->id:0}}
        let route="{{route('akundist-data')}}"
		swal({
	        title: 'Apakah Anda Yakin?',
	        type: 'question',
	        showCancelButton: true,
	        confirmButtonText: 'Iya',
	        cancelButtonText: 'Tidak',
	        allowOutsideClick: false
	    }).then(function(result) {
	        if (result.value) {
				loadshow()

	            var form_data = new FormData()
				form_data.append("a",id==0?'uploadnew':'edit')
				form_data.append("id",id)
				form_data.append("username",$('input[name="username"]').val())
				form_data.append("name",$('input[name="name"]').val())
				form_data.append("email",$('input[name="email"]').val())
                form_data.append("file",$("#foto").prop("files")[0])

	            $.ajax({
	                url: route,
	                cache: false,
	                contentType: false,
	                processData: false,
	                data: form_data,
	                type: 'post',
	                success: (res)=>{
						console.log('res',res);
						swal({
		                    type: 'success',
		                    title: 'Data berhasil disimpan',
		                    showConfirmButton: false,
		                    timer: 1500
		                })
		                $('#modal').modal('hide')
		                $('#list').DataTable().ajax.reload(null, false);
		                $('#modal').empty()
	                },
					error:(err)=>{
						console.log(err)
		                swal(
		                    'Terjadi Kesalahan!',
		                    //response.responseText,
		                    'Mohon Dicek Kembali',
		                    'error'
		                )
					},
	            })
	        }
	    })
    })

</script>
