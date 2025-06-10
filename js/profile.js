
document.addEventListener("DOMContentLoaded", function () {
    fetchUserInfo();
    fetchBookingsInfo();
});
 
function fetchUserInfo() {
    // For demo, replace with your endpoint and parameters.
    fetch('getUserInfo.php?userId=1')
        .then(response => response.json())
        .then(data => {
            document.getElementById('username').textContent = data.username;
            document.getElementById('Email').textContent = data.Email;
            document.getElementById('user_number').textContent = data.user_number;
        });
}
 
function fetchBookingsInfo() {
    // Fetch bookings info similar to user info and populate the `.bookings-info` div.
}
 
// Get the modal and the button that opens it
var modal = document.getElementById("reviewModal");
var button = document.getElementById("reviewButton");
var closeButton = document.querySelector(".close-button");
 
// Open the modal when the button is clicked
button.addEventListener("click", function() {
    modal.style.display = "block";
});
 
// Close the modal when the close button is clicked
closeButton.addEventListener("click", function() {
    modal.style.display = "none";
});
 
// Close the modal when the user clicks outside of it
window.addEventListener("click", function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
});
 
 
// Existing JavaScript remains the same
 
// Add interactivity for star ratings
var serviceRating = document.querySelectorAll('#service-rating .star');
var experienceRating = document.querySelectorAll('#experience-rating .star');
 
// Function to set the rating
function setRating(rating, stars) {
    for (var i = 0; i < stars.length; i++) {
        stars[i].classList.remove('active');
    }
    for (var i = 0; i < rating; i++) {
        stars[i].classList.add('active');
    }
}
 
serviceRating.forEach(function(star, index) {
    star.addEventListener('click', function() {
        setRating(index + 1, serviceRating);
    });
});
 
experienceRating.forEach(function(star, index) {
    star.addEventListener('click', function() {
        setRating(index + 1, experienceRating);
    });
});
 
// Get the button element
var redirectButton = document.getElementById("logoutButton");
 
// Add a click event listener to the button
redirectButton.addEventListener("click", function() {
    window.location.href = "index.php";
});
 