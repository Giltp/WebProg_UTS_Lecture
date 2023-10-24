<?php
include 'Header.php';

// Include the login check file
include 'Login_Check.php';

// Fetch the user's order details from the database

?>
<link rel="stylesheet" href="home.css">

<section class="checkout">
    <div class="container">
        <h2>Checkout</h2>

        <!-- Display the user's order details here -->
        
        <form action="process_order.php" method="post" id="order_form">
            <h3>Billing Information</h3>

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" required>
            </div>

            <!-- Add more input fields as needed for billing information -->

            <h3>Order Details</h3>
            
            <div id="order_items">
                <!-- Dynamically add order items with JavaScript -->
            </div>
            
            <button type="button" onclick="addOrderItem()" class="btn btn-primary">Add Item</button>
            
            <h3>Total Price: <span id="total_price">0</span></h3>

            <h3>Payment Information</h3>

            <div class="form-group">
                <label for="card_number">Card Number</label>
                <input type="text" id="card_number" name="card_number" required>
            </div>

            <div class="form-group">
                <label for="expiry_date">Expiry Date</label>
                <input type="text" id="expiry_date" name="expiry_date" required>
            </div>

            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" required>
            </div>

            <!-- Add more input fields as needed for payment information -->

            <input type="submit" value="Place Order" class="btn btn-primary">
        </form>
    </div>
</section>

<?php
include 'Footer.php';
?>

<script>
    function addOrderItem() {
        var orderItemsContainer = document.getElementById('order_items');
        var totalElement = document.getElementById('total_price');
        
        var orderItemDiv = document.createElement('div');
        orderItemDiv.classList.add('form-group');
        
        var foodInput = document.createElement('input');
        foodInput.type = 'text';
        foodInput.name = 'food[]';
        foodInput.placeholder = 'Food';
        foodInput.required = true;
        orderItemDiv.appendChild(foodInput);
        
        var priceInput = document.createElement('input');
        priceInput.type = 'number';
        priceInput.name = 'price[]';
        priceInput.placeholder = 'Price';
        priceInput.required = true;
        priceInput.addEventListener('input', updateTotalPrice);
        orderItemDiv.appendChild(priceInput);
        
        orderItemsContainer.appendChild(orderItemDiv);
        
        updateTotalPrice();
    }
    
    function updateTotalPrice() {
        var priceInputs = document.querySelectorAll('input[name="price[]"]');
        var totalPrice = 0;
        
        priceInputs.forEach(function(input) {
            totalPrice += parseFloat(input.value) || 0;
        });
        
        var totalElement = document.getElementById('total_price');
        totalElement.textContent = totalPrice.toFixed(2);
    }
</script>