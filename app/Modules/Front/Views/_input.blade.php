<form id="formmodal" enctype="multipart/form-data">
    @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<input id="dokc" type="file" class="dropify" data-allowed-file-extensions="jpg png jpeg"/>				
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" id="saveform">Unggah</button>
                <button class="btn btn-danger" data-dismiss="modal">Batal</button>
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

		let id={{$r?$r->id:0}}
		let oldFile="{{$r?$r->gambar:''}}"
        let route="{{route('front-data')}}"
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
				form_data.append("oldFile",oldFile)
				form_data.append("file",$("#dokc").prop("files")[0])

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
