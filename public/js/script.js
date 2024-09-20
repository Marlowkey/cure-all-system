const bar = document.getElementById('bar');
const nav = document.getElementById('navbar');
const close = document.getElementById('close');

const MainImg = document.getElementById("MainImg");
const smallimg = document.getElementsByClassName("small-img");



if (bar) {
    bar.addEventListener('click', () =>{
        nav.classList.add('active');

    })
}

if (close) {
    close.addEventListener('click', () =>{
        nav.classList.remove('active');

    })
}


// Initialization for ES Users
// import { Input, Ripple, initMDB } from "mdb-ui-kit";

// initMDB({ Input, Ripple });

smallimg[0].onclick = function(){
    MainImg.src = smallimg[0].src;
}
smallimg[1].onclick = function(){
    MainImg.src = smallimg[1].src;
}
smallimg[2].onclick = function(){
    MainImg.src = smallimg[2].src;
}
smallimg[3].onclick = function(){
    MainImg.src = smallimg[3].src;
}

function showLogin() {
    document.getElementById("tab-1").checked = true; // Set login tab as active
}





function addToCart(productId, productName, productPrice, productImage) {
    // Add item to cart (cookie)
    var cartItem = {
        productId: productId,
        productName: productName,
        productPrice: productPrice,
        productImage: productImage,
        quantity: 1 // Assuming quantity is 1 initially
    };

    // Check if cart already exists in cookies
    var cart = JSON.parse(getCookie('cart') || '[]');

    // Check if the item is already in the cart
    var found = false;
    for (var i = 0; i < cart.length; i++) {
        if (cart[i].productId === productId) {
            // Item already exists in cart, update quantity
            cart[i].quantity++;
            found = true;
            break;
        }
    }

    // If item is not already in the cart, add it
    if (!found) {
        cart.push(cartItem);
    }

    // Update the cart cookie
    document.cookie = 'cart=' + JSON.stringify(cart) + ';path=/';

    // Make AJAX request to insert item into database
    $.ajax({
        url: 'insert_into_database.php',
        method: 'POST',
        data: cartItem,
        success: function(response) {
            alert('Item added to cart and database successfully!');
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('Failed to add item to cart and database.');
        }
    });
}

// Function to get cookie by name
function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) return parts.pop().split(";").shift();
}



   function confirmDelete() {
            if (confirm("Are you sure you want to delete the selected products?")) {
                document.getElementById('remove').click();
            }
        }

        // Select/Deselect all checkboxes
        document.getElementById('checkAll').onclick = function() {
            var checkboxes = document.getElementsByClassName('checkbox');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
            updateTotal();
        };

        // JavaScript to update the subtotal based on the quantity and selection
        document.querySelectorAll('.checkbox, .quantity').forEach(function(element) {
            element.addEventListener('input', updateTotal);
        });

        function updateTotal() {
            var totalQuantity = 0;
            var totalAmount = 0;
            var productNames = [];
            
            document.querySelectorAll('.checkbox:checked').forEach(function(checkbox) {
                var row = checkbox.closest('tr');
                var quantityInput = row.querySelector('.quantity');
                var quantity = parseInt(quantityInput.value);
                var price = parseFloat(quantityInput.getAttribute('data-price'));
                var productName = quantityInput.getAttribute('data-product-name');

                totalQuantity += quantity;
                totalAmount += quantity * price;
                productNames.push(productName);

                var subtotalElement = row.querySelector('.subtotal');
                subtotalElement.textContent = (quantity * price).toFixed(2);
            });

            document.getElementById('totalQuantity').textContent = totalQuantity;
            document.getElementById('subtotalAmount').textContent = '₱' + totalAmount.toFixed(2);
            document.getElementById('totalAmount').textContent = '₱' + totalAmount.toFixed(2);
            document.getElementById('productNames').textContent = productNames.join(', ');
        }


    document.getElementById('checkoutButton').onclick = function() {
    var selectedProducts = [];
    document.querySelectorAll('.checkbox:checked').forEach(function(checkbox) {
        var row = checkbox.closest('tr');
        var quantityInput = row.querySelector('.quantity');
        var quantity = parseInt(quantityInput.value);
        var price = parseFloat(quantityInput.getAttribute('data-price'));
        var productName = quantityInput.getAttribute('data-product-name');
        var subtotal = (quantity * price).toFixed(2);

        selectedProducts.push({
            productName: productName,
            quantity: quantity,
            price: price,
            subtotal: subtotal
        });
    });

    if (selectedProducts.length > 0) {
        var form = document.createElement('form');
        form.method = 'post';
        form.action = '../assets/dashboard.php'; // Point to the PHP script handling the checkout

        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'productsData';
        input.value = JSON.stringify(selectedProducts);
        form.appendChild(input);

        document.body.appendChild(form);
        form.submit();
    } else {
        alert('Please select at least one product to proceed to checkout.');
    }
};


