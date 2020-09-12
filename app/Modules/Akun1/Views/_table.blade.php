<div class="card">
    <div class="card-header ">
        <h3 class="card-title ">Daftar akun</h3>
        <div class="card-options">
            <button id="o-new" type="button" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Buat akun baru</button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="list" class="table table-striped">
                <thead class="thead-light">
                    <tr class="">
                        <th class="">Nama</th>
                        <th class="">Nama pengguna</th>
						<th class="">Alamat</th>
                        <th class="">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script>
    $('#o-new').on('click',function(e){
        e.preventDefault()
		loadshow()
        $('#modal').empty().load("{{ route('akundist-load') }}",'a=_input',function(){
            $('#modal').modal('show')
			loadhide()
        })
    })

    $("#list").DataTable({
        ajax: {
            url: "{{ route('akundist-data') }}",
            dataSrc: '',
            type: "POST",
            data:{
                a:"getakun"
            }
        },
        columns: [
            {
                data:'name'
            },
            {
                data:'username',
            },
            {
                data:'alamat',
            },
            {
				orderable: false,
                class : "text-center",
                render: function (data, type, full, meta) {
                    a=''
                    +'	<div class="list-action text-right">'
                    +'		<button type="button" class="btn btn-sm btn-secondary list-edit" data-nm="'+full.name+'" data-id="'+full.id+'"><i class="fa fa-edit"></i>&nbsp; Ubah</button>'
                    +'		<button type="button" class="btn btn-sm btn-danger list-destroy" data-nm="'+full.name+'" data-id="'+full.id+'"><i class="fa fa-trash"></i>&nbsp; Hapus</button>'
                    +'	</div>'
                    return a
                }
            },
        ],
        columnDefs: [
            {targets: 3, orderable: false }
        ],
        responsive: true,
    })

    $('#list tbody')
    .on( 'click', '.list-edit', function (e) {
        e.preventDefault()
		loadshow()
        let id=$(this).data('id')
        $('#modal').empty().load("{{ route('akundist-load') }}",'a=_edit&id='+$(this).data('id'),function(){
            $('#modal').modal('show')
			loadhide()
        })
    })
    .on( 'click', '.list-destroy', function (e) {
        e.preventDefault()
        // console.log('klik');
        // console.log($(this).data('id'));
        let id=$(this).data('id')
        let nm=$(this).data('nm')
        swal({
            title: 'Apakah anda yakin untuk manghapus user '+nm+'?',
            type: 'question',
            showCancelButton: true,
            confirmButtonText: 'Iya!',
            cancelButtonText: 'Batal',
            allowOutsideClick: false
        }).then(function(result) {
            if (result.value) {
                swal({
                    title: 'Mohon menunggu',
                    allowOutsideClick: false,
                })
                swal.showLoading()

                let data={
                    a:'destroy',
                    id:id
                }
                $.post("{{ route('akundist-data') }}", data, function(r) {
                    console.log(r.status)
                    swal({
                        type: 'success',
                        title: 'Data berhasil dihapus',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('#list').DataTable().ajax.reload(null, false);
                }, 'json').fail(function(response) {
                    console.log(response)
                    swal(
                        'Terjadi Kesalahan!',
                        response.responseText,
                        'Mohon Dicek Kembali',
                        'error'
                    )
                });
            }
        })
    })

</script>
