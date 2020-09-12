<div class="card">
    <div class="card-header ">
        <h3 class="card-title ">Daftar Stok Barang</h3>
        <div class="card-options">
            <button id="o-new" type="button" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah Stok Barang</button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="list" class="table table-striped">
                <thead class="thead-light">
                    <tr class="">
                        <th class="">Nomor</th>
                        <th class="">Kode barang</th>
						<th class="">Nama barang</th>
                        <th class="">Jumlah</th>
                        <th class="">Harga</th>
						<th class="text-right">Aksi</th>
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
        $('#modal').empty().load("{{ route('stok-load') }}",'a=_input',function(){
            $('#modal').modal('show')
			loadhide()
        })
    })

	$("#list").DataTable({
        ajax: {
            url: "{{ route('stok-data') }}",
            dataSrc: '',
            type: "POST",
            data:{
                a:"get"
            }
        },
        columns: [
            {
                data:'id',
				class : "text-right",
				width:'75px',
				render: function (data, type, full, meta) {
                    return meta.row+1
                }
            },
            {
                data:'kd_brg',
            },
            {
                data:'nm',
            },
            {
                data:'jumlah',
            },
            {
                data:'harga',
            },
            {
				orderable: false,
                class : "text-right",
                render: function (data, type, full, meta) {
                    let a=''
                    a+='	<div class="text-right">'
					a+='		<button type="button" class="btn btn-sm btn-secondary list-edit" data-id="'+full.id+'"><i class="fa fa-edit"></i>&nbsp; Ubah</button>'
                    a+='		<button type="button" class="btn btn-sm btn-danger list-delete" data-id="'+full.id+'"><i class="fa fa-trash"></i>&nbsp; Hapus</button>'
                    a+='	</div>'
                    return a
                }
            },
        ],
        // columnDefs: [
        //     {targets: 5, orderable: false }
        // ],
        order: [],
        responsive: true,
    })


    $('#list tbody')
    .on( 'click', '.list-edit', function (e) {
        e.preventDefault()
        let id=$(this).data('id')
        $('#modal').empty().load("{{ route('stok-load') }}",'a=_input&id='+id,function(){
            $('#modal').modal('show')
        })
    })
    .on( 'click', '.list-delete', function (e) {
        e.preventDefault()
		let route="{{route('stok-data')}}"
		let id=$(this).data('id')
		let data='a=delete&id='+id
		let txt='Barang ini'

		deldata(route,data,txt)
    })

</script>
