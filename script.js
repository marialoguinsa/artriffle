// Add product to cart
function addToCart(productName, productImage, price) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Check if product already exists
    let existingProductIndex = cart.findIndex(item => item.name === productName);
    if (existingProductIndex !== -1) {
        cart[existingProductIndex].quantity += 1; // Increase quantity
    } else {
        cart.push({
            name: productName,
            image: productImage,
            price: price,
            quantity: 1
        });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    alert('Item added to cart!');
}

// Redirect to cart page
function goToCart() {
    window.location.href = "cart.php"; // Fixed URL
}

// Update cart display
function updateCart() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let cartItems = document.getElementById('cart-items');
    let totalPrice = 0;

    cartItems.innerHTML = ''; 

    // Update cart count
    document.getElementById('cart-count').innerText = cart.reduce((sum, item) => sum + item.quantity, 0);

    if (cart.length === 0) {
        document.getElementById('empty-cart-msg').style.display = 'block';
        document.getElementById('checkout-btn').style.display = 'none';
        document.getElementById('total-price').innerText = 'PHP 0.00';
    } else {
        document.getElementById('empty-cart-msg').style.display = 'none';
        document.getElementById('checkout-btn').style.display = 'inline-block';

        cart.forEach((item, index) => {
            totalPrice += item.price * item.quantity;

            let row = document.createElement('tr');
            row.innerHTML = `
                <td><img src="${item.image}" width="50" height="50"> ${item.name}</td>
                <td>PHP ${item.price.toFixed(2)}</td>
                <td>
                    <button onclick="changeQuantity(${index}, 'decrease')">-</button>
                    ${item.quantity}
                    <button onclick="changeQuantity(${index}, 'increase')">+</button>
                </td>
                <td>PHP ${(item.price * item.quantity).toFixed(2)}</td>
                <td><span class="remove-btn" onclick="removeItem(${index})">Remove</span></td>
            `;
            cartItems.appendChild(row);
        });
        document.getElementById('total-price').innerText = 'PHP ' + totalPrice.toFixed(2);
    }
}

// Change item quantity
function changeQuantity(index, action) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    if (action === 'increase') {
        cart[index].quantity++;
    } else if (action === 'decrease' && cart[index].quantity > 1) {
        cart[index].quantity--;
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    updateCart();
}

// Remove item from cart
function removeItem(index) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCart();
}

// Checkout function
function checkout() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    if (cart.length === 0) {
        alert('Your cart is empty!');
    } else {
        localStorage.removeItem('cart'); // Clear cart
        alert('Successfully checked out!');
        updateCart();
    }
}

// Initial cart load
updateCart();
