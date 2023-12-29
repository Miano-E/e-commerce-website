document.addEventListener("DOMContentLoaded", function () {
    const successMessageTimeout = 2000;

    const addToCartButtons = document.querySelectorAll("button");
    const cartIcon = document.getElementById("cartIcon");
    const closeIcon = document.getElementById("closeIcon");
    const sidebar = document.getElementById("sidebar");
    const closeSidebarIcon = document.getElementById("closeSidebarIcon");

    addToCartButtons.forEach(button => {
        button.addEventListener("click", function (event) {
            const title = this.parentNode.querySelector(".productTitle").textContent;

            const successMessage = document.createElement("div");
            successMessage.className = "success-message";
            successMessage.textContent = `${title} added to cart successfully!`;

            document.body.appendChild(successMessage);

            setTimeout(() => {
                successMessage.remove();
            }, successMessageTimeout);

            addToCart(event); // Pass the event object to the addToCart function
        });
    });

    cartIcon.addEventListener("click", openSidebar);
    closeIcon.addEventListener("click", closeShopping);
    closeSidebarIcon.addEventListener("click", closeSidebar);

    function addToCart(event) {
        const button = event.target;
        const product = button.parentNode;
        const title = product.querySelector(".productTitle").textContent;
        const price = parseFloat(product.querySelector(".card1ProductPrice").textContent.slice(1));

        const existingCartItem = document.querySelector(`.list-card li[data-title="${title}"]`);

        if (existingCartItem) {
            const quantityElement = existingCartItem.querySelector(".quantity");
            let quantity = parseInt(quantityElement.textContent);
            quantity++;
            quantityElement.textContent = quantity;
        } else {
            const cartList = document.querySelector(".list-card");
            const newCartItem = document.createElement("li");
            newCartItem.dataset.title = title;
            newCartItem.innerHTML = `
                <img src="${product.querySelector("img").src}" alt="${title}">
                <div class="cart-item-info">
                    <p>${title}</p>
                    <p class="cart-item-price">${price.toFixed(2)}</p>
                    <p>Quantity: <span class="quantity">1</span></p>
                </div>
            `;
            cartList.appendChild(newCartItem);
        }

        updateCartTotal();
    }

    function openSidebar() {
        updateSidebar();
        sidebar.style.width = "33%";
    }

    function closeShopping() {
        const card = document.querySelector(".card");
        card.style.display = "none";
    }

    function closeSidebar() {
        sidebar.style.width = "0";
    }

    function updateCartTotal() {
        const quantityElements = document.querySelectorAll(".list-card .quantity");
        const totalElement = document.querySelector(".total");

        let totalQuantity = 0;

        quantityElements.forEach(quantityElement => {
            const quantity = parseInt(quantityElement.textContent);
            totalQuantity += quantity;
        });

        document.querySelector(".quantity").textContent = totalQuantity;
    }

    
    function updateSidebar() {
        const cartItems = document.querySelector(".cart-items");
        const totalAmountElement = document.querySelector(".sidebar-total-amount");

        cartItems.innerHTML = "";

        document.querySelectorAll(".list-card li").forEach(cartItem => {
            const title = cartItem.dataset.title;
            const price = parseFloat(cartItem.querySelector(".cart-item-price").textContent);
            const quantity = parseInt(cartItem.querySelector(".quantity").textContent);
            const imageUrl = cartItem.querySelector("img").src;

            const newSidebarItem = document.createElement("li");
            newSidebarItem.innerHTML = `
                <img src="${imageUrl}" alt="${title}" style="width: 100%; height: auto; max-width: 100px; max-height: 100px; margin-right: .8em; border-radius: 25%; padding: 1em;">
                <div class="sidebar-item-info">
                    <p>${title}</p>
                    <p>Price: $${price.toFixed(2)}</p>
                    <p>Quantity: ${quantity}</p>
                </div>
            `;
            cartItems.appendChild(newSidebarItem);
        });

        let totalAmount = 0;

        document.querySelectorAll(".list-card li").forEach(cartItem => {
            const price = parseFloat(cartItem.querySelector(".cart-item-price").textContent);
            const quantity = parseInt(cartItem.querySelector(".quantity").textContent);
            totalAmount += price * quantity;
        });

        totalAmountElement.textContent = totalAmount.toFixed(2);
    }
});