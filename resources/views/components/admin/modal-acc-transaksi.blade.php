@props(['transaction'])
{{-- Modal ACC Transaksi --}}
<div class="modal fade" id="modal-acc{{ $transaction->id }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Acc Pemesanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin ACC? &hellip;</p>
            </div>
            <form action="{{ route('admin.transaksi-berlangsung.bayar', $transaction->id) }}" method="POST"> 
                @csrf
                @method('PUT')
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">ACC</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>