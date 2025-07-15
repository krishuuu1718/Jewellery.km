let cartCount = 0;
let cartItems = [];

// Get elements
let addToCartButtons = document.querySelectorAll(".add-to-cart");
let cartCountDisplay = document.getElementById("cart-count");
let cartList = document.getElementById("cart-items");
let cartPopup = document.getElementById("cart");

// Function to update cart display
function updateCartDisplay() {
    cartList.innerHTML = ""; // Clear old items

    cartItems.forEach(item => {
        let li = document.createElement("li");
        li.textContent = '${item.name} - ₹${item.price}';
        cartList.appendChild(li);
    });
}

// Function to toggle cart visibility
function toggleCart() {
    if (cartPopup.style.display === "block") {
        cartPopup.style.display = "none";
    } else {
        cartPopup.style.display = "block";
    }
}

// Add event listeners to "Add to Cart" buttons
addToCartButtons.forEach(button => {
    button.addEventListener("click", function () {
        let itemName = this.getAttribute("data-name");
        let itemPrice = this.getAttribute("data-price");

        // Add item to cart
        cartItems.push({ name: itemName, price: itemPrice });
        cartCount++;

        // Update cart display
        cartCountDisplay.textContent = cartCount;
        updateCartDisplay();
    });
});