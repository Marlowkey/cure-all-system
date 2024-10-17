<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .dashboard-header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
        }

        .update-status,
        .notification-section {
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .map-container {
            height: 400px; /* Set a fixed height for the map */
            border: 1px solid #dee2e6;
            border-radius: 10px;
            overflow: hidden;
        }

        .status-btn {
            margin: 5px 0;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #dee2e6;
        }

        /* Styling for the toggle button */
        #toggleOrdersBtn {
            margin-bottom: 20px; /* Space below the button */
        }
    </style>

     <!-- Header -->
     <div class="dashboard-header">
        <h1>Rider Delivery Dashboard</h1>
    </div>

    <div class="container mt-4">
        <!-- Toggle Button for Orders to Deliver -->
        <button class="btn btn-info" id="toggleOrdersBtn" data-toggle="modal" data-target="#ordersModal">
            Show Orders to Deliver
        </button>

        <div class="row">
            <div class="col-md-6">
                <!-- Update Status Section -->
                <div class="update-status">
                    <h4>Update Delivery Status</h4>
                    <form id="statusForm">
                        <div class="form-group">
                            <label for="orderId">Order ID</label>
                            <input type="text" class="form-control" id="orderId" placeholder="Enter Order ID" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Delivery Status</label>
                            <select class="form-control" id="status" required>
                                <option value="">Select Status</option>
                                <option value="pending">Pending</option>
                                <option value="in-transit">In Transit</option>
                                <option value="delivered">Delivered</option>
                                <option value="canceled">Canceled</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary status-btn">Update Status</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Real-time Map Section -->
                <h4>Real-time Tracking</h4>
                <div class="map-container" id="map">
                    <!-- Map will be embedded here -->
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- Notification Section -->
                <div class="notification-section">
                    <h4>Notify Admin & Pharmacy</h4>
                    <form id="notificationForm">
                        <div class="form-group">
                            <label for="orderNotificationId">Order ID</label>
                            <input type="text" class="form-control" id="orderNotificationId" placeholder="Enter Order ID" required>
                        </div>
                        <div class="form-group">
                            <label for="paymentStatus">Payment Status</label>
                            <select class="form-control" id="paymentStatus" required>
                                <option value="">Select Payment Status</option>
                                <option value="received">Payment Received</option>
                                <option value="not-received">Payment Not Received</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Notify Admin & Pharmacy</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Orders Modal -->
        <div class="modal fade" id="ordersModal" tabindex="-1" role="dialog" aria-labelledby="ordersModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ordersModalLabel">Orders to Deliver</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="order-item">
                            <div>
                                <strong>Order ID: 101</strong><br>
                                Customer: John Doe<br>
                                Address: 123 Main St.
                            </div>
                            <div>
                                <button class="btn btn-success accept-btn">Accept</button>
                                <button class="btn btn-danger decline-btn">Decline</button>
                            </div>
                        </div>
                        <div class="order-item">
                            <div>
                                <strong>Order ID: 102</strong><br>
                                Customer: Jane Smith<br>
                                Address: 456 Elm St.
                            </div>
                            <div>
                                <button class="btn btn-success accept-btn">Accept</button>
                                <button class="btn btn-danger decline-btn">Decline</button>
                            </div>
                        </div>
                        <!-- Additional orders can be added here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Initialize the map
        function initMap() {
            const deliveryLocation = { lat: -34.397, lng: 150.644 }; // Example coordinates
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12,
                center: deliveryLocation,
            });
            const marker = new google.maps.Marker({
                position: deliveryLocation,
                map: map,
                title: "Your Delivery Location",
            });
        }

        // Update status form submission
        document.getElementById('statusForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const orderId = document.getElementById('orderId').value;
            const status = document.getElementById('status').value;
            alert(`Order ID: ${orderId}\nStatus: ${status} has been updated!`);
            // Implement your logic to send data to your server here
        });

        // Notification form submission
        document.getElementById('notificationForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const orderNotificationId = document.getElementById('orderNotificationId').value;
            const paymentStatus = document.getElementById('paymentStatus').value;
            alert(`Order ID: ${orderNotificationId}\nPayment Status: ${paymentStatus} has been notified!`);
            // Implement your logic to send notification data to your server here
        });

        // Accept and decline order actions
        document.querySelectorAll('.accept-btn').forEach(button => {
            button.addEventListener('click', function () {
                const orderInfo = this.closest('.order-item').querySelector('strong').innerText;
                alert(`You have accepted ${orderInfo}.`);
                // Implement your logic to update the order status here
            });
        });

        document.querySelectorAll('.decline-btn').forEach(button => {
            button.addEventListener('click', function () {
                const orderInfo = this.closest('.order-item').querySelector('strong').innerText;
                alert(`You have declined ${orderInfo}.`);
                // Implement your logic to remove the order from the list here
            });
        });
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script>