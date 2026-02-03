//RESPONSIVE NAV-BAR OPEN AND CLOSE BUTTON FUNCTIONS
const nav = document.querySelector(".nav"),
  
  navOpenBtn = document.querySelector(".navOpenBtn"),
  navCloseBtn = document.querySelector(".navCloseBtn");
  
navOpenBtn.addEventListener("click", () => {
  nav.classList.add("openNav");
  
});
navCloseBtn.addEventListener("click", () => {
  nav.classList.remove("openNav");
});

//Email Validation
function ValidateEmail() {
    var email = document.getElementById("emailAddr").value;

    if (email.trim() === "") {
        alert("Email address cannot be empty.");
        return false;
    }

    if (!email.includes("@")) {
        alert("Email address is missing the domain part (e.g., 'example@example.com').");
        return false;
    }

    var parts = email.split("@");
    if (parts.length !== 2) {
        alert("Invalid email format. Use 'example@example.com'.");
        return false;
    }

    var domain = parts[1];
    if (!domain.includes(".")) {
        alert("Email address is missing the domain part (e.g., 'example@example.com').");
        return false;
    }

    var topLevelDomain = domain.split(".");
    if (topLevelDomain.length !== 2 || topLevelDomain[1].toLowerCase() !== "com") {
        alert("Invalid or missing top-level domain (e.g., 'com').");
        return false;
    }

    alert("Successful login!");
    return true;
}

function togglePasswordVisibility() {
  const passwordInput = document.getElementById('passwordInput');
  if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
  } else {
      passwordInput.type = 'password';
  }
}

document.addEventListener('DOMContentLoaded', function () {
  const starContainers = document.querySelectorAll('.star-rating');

  starContainers.forEach(container => {
      const stars = container.querySelectorAll('.star');
      const hiddenInput = container.querySelector('input[type="hidden"]');

      stars.forEach(star => {
          star.addEventListener('click', () => {
              const ratingValue = star.getAttribute('data-value');
              hiddenInput.value = ratingValue;

              stars.forEach(s => {
                  if (s.getAttribute('data-value') <= ratingValue) {
                      s.classList.add('selected');
                  } else {
                      s.classList.remove('selected');
                  }
              });
          });

          star.addEventListener('mouseover', () => {
              const hoverValue = star.getAttribute('data-value');

              stars.forEach(s => {
                  if (s.getAttribute('data-value') <= hoverValue) {
                      s.classList.add('selected');
                  } else {
                      s.classList.remove('selected');
                  }
              });
          });

          star.addEventListener('mouseout', () => {
              const ratingValue = hiddenInput.value;

              stars.forEach(s => {
                  if (s.getAttribute('data-value') <= ratingValue) {
                      s.classList.add('selected');
                  } else {
                      s.classList.remove('selected');
                  }
              });
          });
      });
  });
});


document.addEventListener('DOMContentLoaded', function() {
    const select = document.getElementById('rating_select');
    const display = document.getElementById('rating_display');

    function updateDisplay(value) {
        let stars = '☆☆☆☆☆';
        if (value > 0) {
            stars = '★'.repeat(value) + '☆'.repeat(5 - value);
        }
        display.textContent = stars;
    }

    // Set initial display
    updateDisplay(select.value);

    // Update display when selection changes
    select.addEventListener('change', function() {
        updateDisplay(this.value);
    });
});



//password length and characters



