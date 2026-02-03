/*function toggleCart() {
    const cart = document.querySelector('.cart');
    if (cart.style.display === 'none' || cart.style.display === '') {
        cart.style.display = 'block';
    } else {
        cart.style.display = 'none';
    }
}

function closeCart() {
    const cart = document.querySelector('.cart');
    cart.style.display = 'none';
}



let list = document.querySelectorAll('.list .item');
list.forEach(item => {
    item.addEventListener('click', function(event){
        if(event.target.classList.contains('add')){
            var itemNew = item.cloneNode(true);
            let checkIsset  = false;

            let listCart = document.querySelectorAll('.cart .item');
            listCart.forEach(cart =>{
                if(cart.getAttribute('data-key') == itemNew.getAttribute('data-key')){
                    checkIsset = true;
                    cart.classList.add('danger');
                    setTimeout(function(){
                        cart.classList.remove('danger');
                    },1000)
                }
            })
            if(checkIsset == false){
                document.querySelector('.listCart').appendChild(itemNew);
            }

        }
    })
})
function Remove($key){
    let listCart = document.querySelectorAll('.cart .item');
    listCart.forEach(item => {
        if(item.getAttribute('data-key') == $key){
            item.remove();
            return;
        }
    })
}

function calculateTotal() {
    let total = 0;
    const cartItems = document.querySelectorAll('.cart .item');
    
    cartItems.forEach(item => {
        // Fetch the price from the 'data-price' attribute and add it to the total
        let price = parseFloat(item.getAttribute('data-key'));
        total += price;
    });

    // Display the total price somewhere, e.g., in a div with the ID 'totalPrice'
    document.getElementById('totalPrice').textContent = 'R' + total.toFixed(2);  // Convert to a string with 2 decimal places
}
*/

let cart = [];

function toggleCart() {
    const cartElem = document.querySelector('.cart');
    if (cartElem.style.display === 'none' || cartElem.style.display === '') {
        cartElem.style.display = 'block';
    } else {
        cartElem.style.display = 'none';
    }
}

function closeCart() {
    const cartElem = document.querySelector('.cart');
    cartElem.style.display = 'none';
}

let list = document.querySelectorAll('.list .item');
list.forEach(item => {
    item.addEventListener('click', function (event) {
        if (event.target.classList.contains('add')) {
            var itemNew = item.cloneNode(true);
            let checkIsset = false;

            let listCart = document.querySelectorAll('.cart .item');
            listCart.forEach(cart => {
                if (cart.getAttribute('data-key') == itemNew.getAttribute('data-key')) {
                    checkIsset = true;
                    cart.classList.add('danger');
                    setTimeout(function () {
                        cart.classList.remove('danger');
                    }, 1000)
                }
            })
            if (checkIsset == false) {
                document.querySelector('.listCart').appendChild(itemNew);
            }

            updateCartDisplay();  // Call this every time an item is added to update quantity and total price
        }
    })
});

function Remove($key) {
    let listCart = document.querySelectorAll('.cart .item');
    listCart.forEach(item => {
        if (item.getAttribute('data-key') == $key) {
            item.remove();
            updateCartDisplay();  // Call this every time an item is removed to update quantity and total price
            return;
        }
    })
}

function updateCartDisplay() {
    const cartQuantityElem = document.querySelector('.shopping .quantity');
    const cartTotalPriceElem = document.querySelector('.cart-total-price');

    let totalQuantity = 0;
    let totalPrice = 0;

    let cartItems = document.querySelectorAll('.cart .item');
    cartItems.forEach(item => {
        totalQuantity++;
        totalPrice += parseFloat(item.getAttribute('data-price'));
    });

    cartQuantityElem.textContent = totalQuantity;
    cartTotalPriceElem.textContent = 'R' + totalPrice.toFixed(2);  // Convert to a string with 2 decimal places
}


// Function to listen for quantity changes on the cart
function bindQuantityListeners() {
    let quantityInputs = document.querySelectorAll('.cart .count');
    quantityInputs.forEach(input => {
        input.addEventListener('change', function() {
            updateCartDisplay();
        });
    });
}

function updateCartDisplay() {
    const cartQuantityElem = document.querySelector('.shopping .quantity');
    const cartTotalPriceElem = document.querySelector('.cart-total-price');

    let totalQuantity = 0;
    let totalPrice = 0;

    let cartItems = document.querySelectorAll('.cart .item');
    cartItems.forEach(item => {
        let itemQuantity = parseInt(item.querySelector('.count').value);
        let itemPrice = parseFloat(item.getAttribute('data-price'));
        
        totalQuantity += itemQuantity;
        totalPrice += itemPrice * itemQuantity;  // Multiply by quantity for each item
    });

    cartQuantityElem.textContent = totalQuantity;
    cartTotalPriceElem.textContent = 'R' + totalPrice.toFixed(2);  // Convert to a string with 2 decimal places
}

// Bind event listeners to the quantity inputs immediately after an item is added
list.forEach(item => {
    item.addEventListener('click', function (event) {
        if (event.target.classList.contains('add')) {
            //... [rest of the code in this listener]
            
            bindQuantityListeners(); // This binds event listeners to the quantity inputs
            updateCartDisplay(); // Call this every time an item is added to update quantity and total price
        }
    });
});

// Call this once on page load for initial setup
bindQuantityListeners();


document.getElementById('checkoutButton').addEventListener('click', function() {
    // If you have a specific URL for your payment gateway, you can use it here
    window.location.href = "path_to_payment_gateway.php";  
});

// Set the earliest selectable check-in date to today's date
document.getElementById('checkinDate').min = getTodayDate();

document.getElementById('checkinDate').addEventListener('change', function() {
    const checkinDate = new Date(this.value);
    const checkoutInput = document.getElementById('checkoutDate');
    
    // Enable the checkout input once a check-in date is selected
    checkoutInput.disabled = false;

    // Set the minimum checkout date to be one day after the check-in date
    const minCheckoutDate = new Date(checkinDate);
    minCheckoutDate.setDate(checkinDate.getDate() + 1);
    checkoutInput.min = formatDate(minCheckoutDate);
    
    // Set the maximum checkout date to be five days after the check-in date
    const maxCheckoutDate = new Date(checkinDate);
    maxCheckoutDate.setDate(checkinDate.getDate() + 5);
    checkoutInput.max = formatDate(maxCheckoutDate);
});

function formatDate(date) {
    let dd = date.getDate();
    let mm = date.getMonth() + 1; // January is 0!
    const yyyy = date.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    return yyyy + '-' + mm + '-' + dd;
}

function getTodayDate() {
    const today = new Date();
    return formatDate(today);
}

document.getElementById('checkinDate').addEventListener('change', function() {
    const checkinDate = new Date(this.value);
    const checkoutInput = document.getElementById('checkoutDate');
    
    // Enable the checkout input once a check-in date is selected
    checkoutInput.disabled = false;

    // Set the minimum checkout date to be one day after the check-in date
    const minCheckoutDate = new Date(checkinDate);
    minCheckoutDate.setDate(checkinDate.getDate() + 1);
    checkoutInput.min = formatDate(minCheckoutDate);
    
    // Set the maximum checkout date to be five days after the check-in date
    const maxCheckoutDate = new Date(checkinDate);
    maxCheckoutDate.setDate(checkinDate.getDate() + 5);
    checkoutInput.max = formatDate(maxCheckoutDate);
});

function formatDate(date) {
    let dd = date.getDate();
    let mm = date.getMonth() + 1; // January is 0!
    const yyyy = date.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    return yyyy + '-' + mm + '-' + dd;
}


