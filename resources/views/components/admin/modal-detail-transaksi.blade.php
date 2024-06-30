@props(['transaction'])
{{-- Modal detail Transaksi --}}
<div class="modal fade" id="modal-detail{{ $transaction->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fotoMobil">Foto Mobil</label>
                                    
                                    <img src="{{ asset($transaction->gambar_mobil) }}"
                                        class="img-fluid overflow-hidden rounded-sm" alt="Responsive image"
                                        width="100%">

                                </div>
                                <div class="form-group">
                                    <label for="buktiTransaksi">
                                        Bukti Transaksi
                                    </label>
                                    <img src="{{ asset($transaction->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="img-thumbnail" width="100">
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Foto Kartu Identitas</label>
                                    <img src="{{ asset($transaction->kartu_identitas) }}" alt="Foto Identitas" class="img-thumbnail" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Customer</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                    readonly value="{{ $transaction->nama_user }}">
                                    </input>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jenis Mobil</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                    readonly value="{{ $transaction->nama_mobil }}"/>
                                    </input>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6"><label for="exampleInputEmail1">Jumlah Hari</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                            readonly value="{{ $transaction->jumlah_hari }}" />
                                        </div>

                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Total</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                            readonly value="{{ $transaction->harga_sewa }}"/>
                                            </input>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
