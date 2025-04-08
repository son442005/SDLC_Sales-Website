let cart = JSON.parse(localStorage.getItem("cart")) || [];

function renderCart() {
    let cartContainer = document.getElementById("cart-items");
    let totalPrice = 0;
    cartContainer.innerHTML = "";

    for (let index = 0; index < cart.length; index++) {
        let item = cart[index];
        let itemTotal = item.price * item.quantity;
        totalPrice += itemTotal;
    
        let productHTML = `
            <div class="cart-item">
                <img src="${item.img}">
                <div>
                    <p><strong>${item.name}</strong></p>
                    <p>$${item.price.toLocaleString()}</p>
                </div>
                <div class="quantity-controls">
                    <button onclick="updateQuantity(${index}, -1)">-</button>
                    <span>${item.quantity}</span>
                    <button onclick="updateQuantity(${index}, 1)">+</button>
                </div>
                <p><strong>$${itemTotal.toLocaleString()}</strong></p>
            </div>
        `;
    
        cartContainer.innerHTML += productHTML;
    }    

    document.getElementById("totalPrice").innerText = totalPrice.toLocaleString();

    localStorage.setItem("cart", JSON.stringify(cart));
}

function updateQuantity(index, change) {
    if (cart[index].quantity + change > 0) {
        cart[index].quantity += change;
    } else {
        cart.splice(index, 1); 
    }
    renderCart();
}

function clearCart() {
    cart = [];
    localStorage.removeItem("cart"); 
    renderCart();
}

function payAll(){
    if (confirm("Are you sure you want to pay for all items?")) {
        alert("Payment successful!");
        clearCart();
    } else {
        alert("Payment canceled");
    }
}
window.onload = function() {
    renderCart();
};
