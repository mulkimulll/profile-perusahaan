<form id="formmodal" enctype="multipart/form-data">
    @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Stok Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Nama barang</label>
                    <input name="nm" type="text" class="form-control" value="{{$r?$r->nm:''}}">
                </div>
                <div class="form-group">
                    <label class="form-label">Kode barang</label>
                    <input name="kd_brg" type="text" class="form-control" value="{{$r?$r->kd_brg:''}}">
                </div>
                <div class="form-group">
                    <label class="form-label">Jumlah</label>
                    <input name="jumlah" type="number" class="form-control" value="{{$r?$r->jumlah:''}}">
                </div>
                <div class="form-group">
                    <label class="form-label">Harga</label>
                    <input name="harga" type="text" class="form-control" value="{{$r?$r->harga:''}}">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" id="saveform">Unggah</button>
                <button class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</form>

<script>
    $('#saveform').on('click', function (e) {
        e.preventDefault()
        let route="{{route('stok-data')}}"

        let id={{$r?$r->id:0}}
        let data=(id==0?'a=savenew&':'a=edit&id='+id+'&')
        data+=$("#formmodal").serialize()

        saveform(route,data)
    })
</script>
