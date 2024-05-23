<div class="modal fade" id="basicModalTransaction{{ $row->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Name: {{ $row->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="">
                    <label for="inputText" class=" col-form-label">Name:</label>
                    <div class="">
                        <input type="text" class="form-control" value="{{ $row->name }}" disabled>
                    </div>
                </div>

                <div class="">
                    <label for="inputText" class=" col-form-label">Email:</label>
                    <div class="">
                        <input type="text" class="form-control" value="{{ $row->email }}" disabled>
                    </div>
                </div>

                <div class="">
                    <label for="inputText" class=" col-form-label">Phone:</label>
                    <div class="">
                        <input type="text" class="form-control" value="{{ $row->phone }}" disabled>
                    </div>
                </div>
                <div class="">
                    <label for="inputText" class=" col-form-label">Address:</label>
                    <div class="">
                        <input type="text" class="form-control" value="{{ $row->address }}" disabled>
                    </div>
                </div>
                <div class="">
                    <label for="inputText" class=" col-form-label">Courier:</label>
                    <div class="">
                        <input type="text" class="form-control" value="{{ $row->courier }}" disabled>
                    </div>
                </div>
                <div class="">
                    <label for="inputText" class=" col-form-label">Payment:</label>
                    <div class="">
                        <input type="text" class="form-control" value="{{ $row->payment }}" disabled>
                    </div>
                </div>
                <div class="">
                    <label for="inputText" class=" col-form-label">Payment URL:</label>
                    <div class="">
                        @if ($row->payment_url == '')
                        <span class="badge bg-danger">GAGAL</span>
                    @else
                        <a href="{{ $row->payment_url }}" class="btn btn-success">MIDTRANS</a>
                    @endif
                    </div>
                </div>

                <div class="">
                    <label for="inputText" class=" col-form-label">Status:</label>
                    <div class="">
                        <input type="text" class="form-control" value="{{ $row->status }}" disabled>
                    </div>
                </div>

                <div class="">
                    <label for="inputText" class=" col-form-label">Total price:</label>
                    <div class="">
                        <input type="text" class="form-control" value="IDR {{ number_format($row->total_price) }}" disabled>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
