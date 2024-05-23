<!-- Basic Modal -->
<div class="modal fade" id="basicModal{{ $row->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="Name Account"></label>
                <input type="text" value="{{ Auth::user()->name }}" class="form-control" disabled>

                <label for="Name Rechive"></label>
                <input type="text" value="{{ $row->name }}" class="form-control" disabled>

                <label for="Email"></label>
                <input type="text" value="{{ $row->email }}" class="form-control" disabled>

                <label for="Phone"></label>
                <input type="text" value="{{ $row->phone }}" class="form-control" disabled>

                <label for="Price"></label>
                <input type="text" value="{{ $row->total_price }}" class="form-control" disabled>

                <label for="Paymnet"></label>
                <input type="text" value="{{ $row->payment }}" class="form-control" disabled>

                <label for="Status"></label>
                <input type="text" value="{{ $row->status }}" class="form-control" disabled>

                <label for="Status"></label>
                <a href="{{ $row->payment_url }}" class="form-control">{{ $row->payment_url }}</a>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div><!-- End Basic Modal-->