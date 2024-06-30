{{-- Modal Transaksi --}}
@props(['mobil', 'user'])
<div class="modal fade" id="modal-transaksi{{ $mobil->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Transaksi</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.transaksi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="mobil_id" value="{{ $mobil->id }}">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div class="form-group">
                                <label for="fotoMobil">Foto Mobil</label>
                                <img src="{{ asset($mobil->gambar) }}" class="img-fluid overflow-hidden rounded-sm" alt="{{ $mobil->nama_mobil }}" width="100%">
                            </div>
                            <div class="form-group">
                                <label for="kartuIdentitas">Kartu Identitas</label>
                                <img src="{{ asset($user->kartu_identitas) }}" class="img-fluid overflow-hidden rounded-sm mb-3" alt="preview" width="100%" id="imgPreview{{ $user->id }}" style="display: none;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama Customer</label>
                                <input type="text" class="form-control" id="name" placeholder="{{ $user->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama_mobil">Jenis Mobil</label>
                                <input type="text" class="form-control" id="nama_mobil" placeholder="{{ $mobil->nama_mobil }}" readonly>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="jumlah_hari">Jumlah Hari</label>
                                        <input type="number" class="form-control" id="jumlah_hari{{ $mobil->id }}" name="jumlah_hari" placeholder="1">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="total_biaya">Total</label>
                                        <input type="text" class="form-control" id="total_biaya{{ $mobil->id }}" name="total_biaya" readonly value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Foto Kartu Identitas</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="kartu_identitas" name="kartu_identitas" onchange="previewImage(this, 'imgPreview{{ $user->id }}')">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <div class="mr-3">
                            <label>Jumlah DP : </label>
                            <input type="text" id="dp{{ $mobil->id }}" readonly name="dp" value="">
                        </div>
                        <x-primary-button type="submit" class="btn btn-default" data-bs-dismiss="modal">Konfirmasi</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const jumlahHariInput = document.getElementById('jumlah_hari{{ $mobil->id }}');
        const totalHargaInput = document.getElementById('total_biaya{{ $mobil->id }}');
        const dp = document.getElementById('dp{{ $mobil->id }}');
        const hargaSewa = {{ $mobil->harga_sewa }};

        var imgElement = document.getElementById('imgPreview{{ $user->id }}');
        if (imgElement.src && imgElement.src !== '{{ asset('') }}') {
            imgElement.style.display = 'block';
        }

        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(number);
        }

        // Mengatur nilai awal berdasarkan placeholder
        const jumlahHariAwal = jumlahHariInput.placeholder || 1;
        totalHargaInput.value = formatRupiah(jumlahHariAwal * hargaSewa);
        dp.value = formatRupiah(jumlahHariAwal * hargaSewa * 0.5);

        jumlahHariInput.addEventListener('input', function () {
            const jumlahHari = this.value || jumlahHariAwal;
            const totalHarga = jumlahHari * hargaSewa;
            totalHargaInput.value = formatRupiah(totalHarga);
            dp.value = formatRupiah(totalHarga * 0.5);
        });
    });

    function previewImage(input, imgId) {
        var imgElement = document.getElementById(imgId);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imgElement.src = e.target.result;
                imgElement.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            imgElement.src = '';
            imgElement.style.display = 'none';
        }
    }
</script>
