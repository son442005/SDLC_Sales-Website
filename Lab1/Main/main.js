function toCart() {
    window.location.href = "../Cart/cart.html";
}
function toAccount() {
    window.location.href = "../Login/login.php";
}
let slideIndex = 0;
function showSlides() {
    let slides = document.getElementsByClassName("slide");
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1; }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 3000);
}
showSlides();

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".product button").forEach(button => {
        button.addEventListener("click", function (event) {
            addToCart(event);
        });
    });
});
function addToCart(event) {
    let productElement = event.target.closest(".product");
    if (!productElement) return;
    let product = {
        img: productElement.querySelector(".img").src,
        name: productElement.querySelector("h3").innerText,
        price: parseFloat(productElement.querySelector(".second-price").innerText.replace("$", "").replace(",", "")),
        quantity: 1
    };
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let existingProduct = cart.find(item => item.name === product.name);
    if (existingProduct) {
        existingProduct.quantity += 1;
    } else {
        cart.push(product);
    }
    localStorage.setItem("cart", JSON.stringify(cart));
    alert(product.name + " has been added to cart =^..^=");
}
