@props(['total'])
<form action="{{ route('order.store') }}" method="POST" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div data-mdb-input-init class="form-outline mb-2">
        <input readonly  type="text" id="paymentMethod" class="form-control form-control-lg" name="payment_method"
            value="{{ old('payment_method', 'Cash on Delivery') }}" minlength="19" maxlength="19" />
        <label class="form-label" for="paymentMethod">Payment Method</label>
        @error('payment_method')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div data-mdb-input-init class="form-outline mb-2">
        <input readonly  type="number" id="totalAmount" class="form-control form-control-lg" name="total"
            value="{{ old('total', number_format($total, 2, '.', '')) }}" min="0" step="0.01" />
        <label class="form-label" for="totalAmount">Total Amount</label>
        @error('total')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div data-mdb-input-init class="form-outline mb-2">
        <div class="form-group">
            <label for="prescription_image">Upload Prescription Image</label>
            <input type="file" id="prescription_image" name="prescription_image" class="form-control" accept="image/*">
            @error('prescription_image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <p class="mb-2">Make sure to update your address in the <a href="{{ route('profile.edit') }}">profile section</a>.</p>
    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="mb-5 btn btn-primary btn-block btn-lg">
        Buy now
    </button>
</form>
