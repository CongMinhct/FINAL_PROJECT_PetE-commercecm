<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="Front_end/lib/easing/easing.min.js"></script>
<script src="Front_end/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="Front_end/mail/jqBootstrapValidation.min.js"></script>
<script src="Front_end/mail/contact.js"></script>

<!-- Template Javascript -->
<script src="Front_end/js/main.js"></script>


<script>
    // JavaScript to handle quantity changes and update total amount
    const quantityInputs = document.querySelectorAll(".quantity-input");

    quantityInputs.forEach((input) => {
        input.addEventListener("change", (event) => {
            const item_id = event.target.getAttribute("data-item-id");
            const price = parseFloat(event.target.closest('tr').getAttribute('data-item-price'));
            const quantity = parseInt(event.target.value);
            const totalAmountElement = document.getElementById(`total-${item_id}`);
            const total = price * quantity;

            totalAmountElement.textContent = `$${total}`;
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var button = document.getElementById('add-to-cart-button-pet');
        if (button) {
            button.addEventListener('click', addToCartPet);
        }
    });

    function addToCartPet(event) {
        event.preventDefault(); // Prevent the default behavior of the link

        var petId = this.getAttribute('data-pet-id');

        // Get the CSRF token value
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('/Clients/Cart/add-to-cart/' + petId + '/pet', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
                }
            })
            .then(response => {
                // Update the cart count
                return fetch('/Clients/Cart/get-cart-count');
            })
            .then(response => response.json())
            .then(data => {
                // Update the cart count on the page
                var cartCountElement = document.getElementById('cart-count');
                if (cartCountElement) {
                    cartCountElement.textContent = data.cartCount;
                }
            })
            .catch(error => {
                // Handle any errors that occur during the request
            });
    }
</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        var button = document.getElementById('add-to-cart-button-product');
        if (button) {
            button.addEventListener('click', addToCartProduct);
        }

    });

    function addToCartProduct(event) {
        event.preventDefault(); // Prevent the default behavior of the link

        var productId = this.getAttribute('data-product-id');

        // Get the CSRF token value
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('/Clients/Cart/add-to-cart/' + productId + '/product', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
                }
            })
            .then(response => {
                // Update the cart count
                return fetch('/Clients/Cart/get-cart-count');
            })
            .then(response => response.json())
            .then(data => {
                // Update the cart count on the page
                var cartCountElement = document.getElementById('cart-count');
                if (cartCountElement) {
                    cartCountElement.textContent = data.cartCount;
                }
            })
            .catch(error => {
                // Handle any errors that occur during the request
            });
    }
</script>





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".price-filter").change(function() {
            filterProductsByPrice();
        });

        function filterProductsByPrice() {
            var selectedPrices = $(".price-filter:checked");
            var minPrice = Number.MAX_SAFE_INTEGER;
            var maxPrice = Number.MIN_SAFE_INTEGER;

            selectedPrices.each(function() {
                var min = parseFloat($(this).data("min"));
                var max = parseFloat($(this).data("max"));
                if (min < minPrice) {
                    minPrice = min;
                }
                if (max > maxPrice) {
                    maxPrice = max;
                }
            });

            $(".product-item").each(function() {
                var price = parseFloat($(this).data("price"));
                if (price >= minPrice && price <= maxPrice) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    });
</script>


<!-- Add this script after the cart items table -->
<!-- Add this script after the cart items table -->

<?php /**PATH D:\GraduationThesis_PetE-commerce_G5\resources\views/Front_end/Layouts/js.blade.php ENDPATH**/ ?>