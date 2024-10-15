@props(['orderItem'])

<script>
    function incrementQuantity(id) {
        const input = document.querySelector(`#form-${id} input[name="quantity"]`);
        input.value = parseInt(input.value) + 1; // Increase quantity
        updateQuantity(id); // Submit form
    }

    function decrementQuantity(id) {
        const input = document.querySelector(`#form-${id} input[name="quantity"]`);
        if (input.value > 1) { // Prevent going below 1
            input.value = parseInt(input.value) - 1; // Decrease quantity
            updateQuantity(id); // Submit form
        }
    }

    function updateQuantity(id) {
        const form = document.querySelector(`#form-${id}`);
        const submitButton = document.querySelector(`#submit-${id}`);
        submitButton.click(); // Submit the form
    }
</script>

<div class="card rounded-3 mb-4">
    <div class="card-body p-4">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-2 col-lg-2 col-xl-2">
                <img src="{{ Str::startsWith($orderItem->medicine->image_path, 'http') ? $orderItem->medicine->image_path : asset('storage/' . $orderItem->medicine->image_path) }}" class="img-fluid rounded-3" alt="{{ $orderItem->medicine->name }}">
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2">{{ $orderItem->medicine->name }}</p>
                <p><span class="text-muted">Brand: </span>{{ $orderItem->medicine->brand  }}</p>
            </div>

            <!-- Update quantity form -->
            <div class="col-md-4 col-lg-4 col-xl-3 d-flex">
                <form action="{{ route('cart.update', ['id' => $orderItem->id]) }}" method="POST" class="d-flex" id="form-{{ $orderItem->id }}">
                    @csrf
                    @method('PATCH')
                    <button type="button" class="btn btn-link px-2" onclick="decrementQuantity('{{ $orderItem->id }}')">
                        <i class="fas fa-minus"></i>
                    </button>
                    <input min="1" name="quantity" value="{{ $orderItem->quantity }}" type="number" class="form-control form-control-sm" onchange="updateQuantity('{{ $orderItem->id }}')" />
                    <button type="button" class="btn btn-link px-2" onclick="incrementQuantity('{{ $orderItem->id }}')">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button hidden type="submit" class="btn btn-link text-success px-2" style="display: none;" id="submit-{{ $orderItem->id }}">
                        <i class="fas fa-check"></i>
                    </button>
                </form>
            </div>

             <!-- Displaying the Price -->
             <div class="col-md-2 col-lg-2 col-xl-2 text-center">
                <h5 class="mb-0">₱{{ number_format($orderItem->medicine->price * $orderItem->quantity, 2) }}</h5>
                <p class="text-muted mb-0">₱{{ number_format($orderItem->medicine->price, 2) }} each</p>
            </div>

            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <form action="{{ route('cart.destroy', ['id' => $orderItem->id]) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-danger" style="background: none; border: none; padding: 0;">
                        <i class="fas fa-trash fa-lg"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>
