@props(['orderItem'])
<div class="card rounded-3 mb-4">
    <div class="card-body p-4">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-2 col-lg-2 col-xl-2">
                <img src="{{ $orderItem->medicine->image_path }}" class="img-fluid rounded-3" alt="{{ $orderItem->medicine->name }}">
            </div>m
            <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2">{{ $orderItem->medicine->name }}</p>
                <p><span class="text-muted">Brand: </span>{{ $orderItem->medicine->brand  }}</p>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                    <i class="fas fa-minus"></i>
                </button>

                <input min="0" name="quantity" value="{{ $orderItem->quantity }}" type="number" class="form-control form-control-sm" />
                <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0">₱{{ number_format($orderItem->medicine->price, 2) }}</h5>
            </div>
            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a href="#" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
            </div>
        </div>
    </div>
</div>
