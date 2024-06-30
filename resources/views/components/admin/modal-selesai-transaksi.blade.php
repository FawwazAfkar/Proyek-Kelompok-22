@props(['transaction'])
{{-- Modal Selesai Transaksi --}}
<div class="modal fade" id="modal-selesai{{ $transaction->id }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Selesaikan Sewa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin Selesaikan? &hellip;</p>
            </div>
            <form action="{{ route('admin.transaksi-berlangsung.selesai', $transaction->id) }}" method="POST"> 
                @csrf
                @method('PUT')
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Selesai</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>