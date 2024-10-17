
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
      .medicine-container {
        border: 1px solid #dee2e6;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center; /* Center align the content inside the container */
        }

        .medicine-image {
            width: 255px; /* Set the width to 100% of the container */
            height: 250px; /* Fixed height of 500px */
            object-fit: cover; /* Maintain aspect ratio and cover the area */
            border-radius: 10px;
            display: block; /* Remove inline spacing */
            margin: 0 auto; /* Center the image */
        }

        .price {
            font-size: 1.5em;
            color: #28a745; /* Bootstrap success color */
        }

        .inventory {
            color: #6c757d; /* Bootstrap muted text color */
        }

        .quantity-adjuster {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .quantity-adjuster input {
            width: 60px;
            text-align: center;
        }

        .cart-icon {
            font-size: 1.5em;
            margin-left: 10px;
            cursor: pointer;
        }
    </style>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="medicine-container">
                    <img src="path/to/medicine-image.jpg" alt="Medicine Image" class="medicine-image">
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="font-weight-bold">Medicine Name</h2>
                <h5 class="text-muted">Brand: <span>Brand Name</span></h5>
                <p class="text-muted">Description: This is a brief description of the medicine, outlining its uses and benefits.</p>
                <p class="price">₱99.99</p>
                <p class="inventory">Available Quantity: <span>50</span></p>
                <div class="quantity-adjuster">
                    <button class="btn btn-secondary btn-sm" onclick="adjustQuantity(-1)">-</button>
                    <input type="number" id="quantity" value="1" min="1" max="50" readonly>
                    <button class="btn btn-secondary btn-sm" onclick="adjustQuantity(1)">+</button>
                    <i class="fas fa-shopping-cart cart-icon" title="Add to Cart"></i>
                </div>
            </div>
        </div>
    </div>

    <script>
        function adjustQuantity(change) {
            const quantityInput = document.getElementById('quantity');
            let currentQuantity = parseInt(quantityInput.value);
            currentQuantity = Math.max(1, Math.min(50, currentQuantity + change)); // Keep within limits
            quantityInput.value = currentQuantity;
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

