{{-- Modal Transaksi --}}
@props(['mobil', 'user'])
<div class="modal fade" id="modal-transaksi{{ $mobil->id }}"> 
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Transaksi</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.transaksi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mobild-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fotoMobil">Foto Mobil</label>

                                    <img src="{{ asset($mobil->gambar) }}"
                                        class="img-fluid overflow-hidden rounded-sm" alt="{{ $mobil->nama_mobil }}"
                                        width="100%">

                                </div>
                                <div class="form-group">
                                    <label for="kartuIdentitas">
                                        Kartu Identitas
                                    </label>

                                    <img src="{{ asset($user->kartu_identitas) }}"
                                        class="img-fluid overflow-hidden rounded-sm" alt="{{ $user->nama_lengkap }}"
                                        width="100%">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=name">Nama Customer</label>
                                    <input type="text" class="form-control" id="name"
                                        placeholder="{{ $user->name }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama_mobil">Jenis Mobil</label>
                                    <input type="text" class="form-control" id="nama_mobil"
                                        placeholder="{{ $mobil->nama_mobil }}" readonly>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6"><label for="jumlah_hari">Jumlah Hari</label>
                                            <input type="number" class="form-control" id="jumlah_hari{{ $mobil->id }}" name="jumlah_hari" placeholder="1">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="total_harga">Total</label>
                                            <input type="text" class="form-control" id="total_harga{{ $mobil->id }}" name="total_harga"
                                                readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Foto Kartu Identitas</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file" name="file">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-end">
                <div class="mr-3">
                    <label>Jumlah DP : </label>
                    <span id="dp{{ $mobil->id }}"></span>
                </div>
                <x-primary-button type="button" class="btn btn-default" data-bs-dismiss="modal">Konfirmasi</x-primary-button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const jumlahHariInput = document.getElementById('jumlah_hari{{ $mobil->id }}');
        const totalHargaInput = document.getElementById('total_harga{{ $mobil->id }}');
        const dpSpan = document.getElementById('dp{{ $mobil->id }}');
        const hargaSewa = {{ $mobil->harga_sewa }};

        function formatRupiah(number){
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(number);
        }

        // Mengatur nilai awal berdasarkan placeholder
        const jumlahHariAwal = jumlahHariInput.placeholder || 1;
        totalHargaInput.value = formatRupiah(jumlahHariAwal * hargaSewa);
        dpSpan.textContent = formatRupiah(jumlahHariAwal * hargaSewa * 0.5);

        jumlahHariInput.addEventListener('input', function () {
            const jumlahHari = this.value || jumlahHariAwal; 
            const totalHarga = jumlahHari * hargaSewa;
            totalHargaInput.value = formatRupiah(totalHarga);
            dpSpan.textContent = formatRupiah(totalHarga * 0.5);
        });
    });
</script>