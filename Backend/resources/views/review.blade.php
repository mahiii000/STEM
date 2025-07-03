<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Write Your Review</title>
  <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
  <style>
    body {
      background: #fff !important;
    }

    .review-container {
      max-width: 600px;
      width: 100%;
      margin: 40px auto;
      text-align: center;
    }

    h1 {
      font-size: 24px;
      color: #081138;
      margin-bottom: 5px;
    }

    p {
      color: #676767;
      font-size: 14px;
      margin-bottom: 40px;
    }

    .stars {
      display: flex;
      justify-content: center;
      margin-bottom: 30px;
    }

    .star {
      font-size: 30px;
      color: #ccc;
      cursor: pointer;
      transition: color 0.2s;
    }

    .star.selected {
      color: gold;
    }

    form {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .half-width {
      flex: 1 1 calc(50% - 10px);
    }

    .full-width {
      flex: 1 1 100%;
    }

    input,
    textarea {
      width: 100%;
      border: none;
      border-bottom: 2px solid #333;
      padding: 8px 0;
      font-size: 14px;
      outline: none;
      background: transparent;
    }

    textarea {
      resize: vertical;
      min-height: 80px;
    }

    button {
      margin: 20px auto 0;
      padding: 10px 30px;
      border: none;
      border-radius: 20px;
      background: #9747ff;
      color: #fff;
      font-size: 14px;
      cursor: pointer;
      transition: background 0.3s;
      font-family: 'Patrick Hand', cursive;
    }

    button:hover {
      background: #7a35d9;
    }

    #formErrors {
      display: none;
      position: fixed;
      top: 30px;
      left: 50%;
      transform: translateX(-50%);
      background: #fff3f3;
      color: #d8000c;
      border: 1px solid #d8000c;
      padding: 16px 32px;
      z-index: 9999;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
      font-size: 16px;
      min-width: 300px;
      max-width: 90%;
      text-align: left;
    }

    #formSuccess {
      display: none;
      position: fixed;
      top: 30px;
      left: 50%;
      transform: translateX(-50%);
      background: #e6ffed;
      color: #207d3a;
      border: 1px solid #207d3a;
      padding: 16px 32px;
      z-index: 9999;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
      font-size: 16px;
      min-width: 300px;
      max-width: 90%;
      text-align: left;
    }

    #newsletterError {
      display: none;
      position: fixed;
      top: 90px;
      left: 50%;
      transform: translateX(-50%);
      background: #fff3f3;
      color: #d8000c;
      border: 1px solid #d8000c;
      padding: 16px 32px;
      z-index: 9999;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
      font-size: 16px;
      min-width: 300px;
      max-width: 90%;
      text-align: left;
    }

    #newsletterSuccess {
      display: none;
      position: fixed;
      top: 90px;
      left: 50%;
      transform: translateX(-50%);
      background: #e6ffed;
      color: #207d3a;
      border: 1px solid #207d3a;
      padding: 16px 32px;
      z-index: 9999;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
      font-size: 16px;
      min-width: 300px;
      max-width: 90%;
      text-align: left;
    }
  </style>
</head>

<body>
  <header>
    <div class="header-left">
      <img src="{{ asset('images/bright-mind-logo.png') }}" alt="Bright Mind Logo" class="logo-img">
    </div>

    <nav class="navbar">
      <div class="nav-center">
        <ul class="nav-icons">
          <li>
            <div class="icon-box"><img src="{{ asset('images/home-icon.png') }}" alt="Home"></div>
            <p>Home</p>
          </li>
          <li>
            <div class="icon-box"><img src="{{ asset('images/learning-icon.png') }}" alt="Learning"></div>
            <p>Learning</p>
          </li>
          <li>
            <div class="icon-box"><img src="{{ asset('images/teaching-icon.png') }}" alt="Teachers"></div>
            <p>Teachers</p>
          </li>
          <li>
            <div class="icon-box"><img src="{{ asset('images/blog-icon.png') }}" alt="Blogs"></div>
            <p>Blogs</p>
          </li>
        </ul>
      </div>

      <div class="language-auth">
        <div class="language-buttons">
          <button>Ar</button>
          <button class="active">Eng</button>
        </div>
        <div class="auth-buttons">
          <a href="#">Sign Up</a>
          <button class="login">Log In</button>
        </div>
      </div>
    </nav>
  </header>
  <div class="review-container">
    <h1>Write Your Review</h1>
    <p>Your opinion matters to us!</p>
    <div id="formSuccess" style="display:none;position:fixed;top:30px;left:50%;transform:translateX(-50%);background:#e6ffed;color:#207d3a;border:1px solid #207d3a;padding:16px 32px;z-index:9999;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.15);font-size:16px;min-width:300px;max-width:90%;text-align:left;" role="alert"></div>
    <div class="stars">
      <span class="star" data-value="1">&#9733;</span>
      <span class="star" data-value="2">&#9733;</span>
      <span class="star" data-value="3">&#9733;</span>
      <span class="star" data-value="4">&#9733;</span>
      <span class="star" data-value="5">&#9733;</span>
    </div>

    <form method="POST" action="{{ route('review.submit') }}" id="reviewForm" novalidate>
      @csrf
      <div class="half-width">
        <input type="text" name="first_name" placeholder="First name" required pattern="[A-Za-z\s]+" maxlength="50">
      </div>
      <div class="half-width">
        <input type="text" name="last_name" placeholder="Last name" required pattern="[A-Za-z\s]+" maxlength="50">
      </div>
      <div class="half-width">
        <input type="email" name="email" placeholder="Email" required maxlength="100">
      </div>
      <div class="half-width">
        <input type="tel" name="phone" placeholder="Phone" required pattern="[0-9\-\+\s]+" maxlength="20">
      </div>
      <div class="full-width">
        <input type="text" name="subject" placeholder="Subject" required maxlength="100">
      </div>
      <div class="full-width">
        <textarea name="message" placeholder="Message" required maxlength="500"></textarea>
      </div>
      <input type="hidden" name="rating" id="ratingInput">
      <button type="submit">SUBMIT</button>
      <div id="formErrors" style="display:none;position:fixed;top:30px;left:50%;transform:translateX(-50%);background:#fff3f3;color:#d8000c;border:1px solid #d8000c;padding:16px 32px;z-index:9999;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.15);font-size:16px;min-width:300px;max-width:90%;text-align:left;" role="alert"></div>
    </form>
    <div id="newsletterError" style="display:none;position:fixed;top:90px;left:50%;transform:translateX(-50%);background:#fff3f3;color:#d8000c;border:1px solid #d8000c;padding:16px 32px;z-index:9999;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.15);font-size:16px;min-width:300px;max-width:90%;text-align:left;" role="alert"></div>
    <div id="newsletterSuccess" style="display:none;position:fixed;top:90px;left:50%;transform:translateX(-50%);background:#e6ffed;color:#207d3a;border:1px solid #207d3a;padding:16px 32px;z-index:9999;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.15);font-size:16px;min-width:300px;max-width:90%;text-align:left;" role="alert"></div>
  </div>
  <footer class="custom-footer">
    <div class="footer-left">
      <p>Follow Us</p>
      <div class="social-icons">
        <img src="{{ asset('images/x-logo.png') }}" alt="X">
        <img src="{{ asset('images/ig-logo.png') }}" alt="Instagram">
        <img src="{{ asset('images/yt-logo.png') }}" alt="YouTube">
        <img src="{{ asset('images/linkedin-logo.png') }}" alt="LinkedIn">
      </div>
    </div>

    <div class="footer-right">
      <h3>Subscribe to get our Newsletter</h3>
      <div class="newsletter">
        <input type="email" id="newsletterEmail" placeholder="Your Email">
        <button id="newsletterBtn">Subscribe</button>
      </div>
      <div class="footer-links">
        <a href="#">Careers</a> |
        <a href="#">Privacy Policy</a> |
        <a href="#">Terms & Conditions</a>
      </div>
      <p class="copyright">© 2025 AURAK & RIT STUDENTS</p>
    </div>
  </footer>

  <script>
    const stars = document.querySelectorAll('.star');
    let selectedRating = 0;
    const ratingInput = document.getElementById('ratingInput');

    stars.forEach(star => {
      star.addEventListener('mouseover', () => {
        const val = star.getAttribute('data-value');
        highlightStars(val);
      });

      star.addEventListener('mouseout', () => {
        highlightStars(selectedRating);
      });

      star.addEventListener('click', () => {
        selectedRating = star.getAttribute('data-value');
        highlightStars(selectedRating);
        ratingInput.value = selectedRating;
      });
    });

    function highlightStars(rating) {
      stars.forEach(star => {
        if (star.getAttribute('data-value') <= rating) {
          star.classList.add('selected');
        } else {
          star.classList.remove('selected');
        }
      });
    }

    document.getElementById('reviewForm').addEventListener('submit', function(e) {
      let valid = true;
      let errors = [];
      const firstName = this.elements['first_name'].value.trim();
      const lastName = this.elements['last_name'].value.trim();
      const email = this.elements['email'].value.trim();
      const phone = this.elements['phone'].value.trim();
      const subject = this.elements['subject'].value.trim();
      const message = this.elements['message'].value.trim();
      const rating = this.elements['rating'].value.trim();
      const nameRegex = /^[A-Za-z\s]+$/;
      const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      const phoneRegex = /^[0-9\-\+\s]+$/;
      const formErrors = document.getElementById('formErrors');
      const formSuccess = document.getElementById('formSuccess');
      formErrors.style.display = 'none';
      formErrors.innerHTML = '';
      formSuccess.style.display = 'none';
      formSuccess.innerHTML = '';
      if (window.formErrorsTimeout) clearTimeout(window.formErrorsTimeout);

      // Required fields check
      if (!firstName || !lastName || !email || !phone || !subject || !message) {
        errors.push('All fields are required.');
        valid = false;
      }
      // Rating required check
      if (!rating) {
        errors.push('Rating is Required');
        valid = false;
      }
      // Name validation
      if ((firstName && !nameRegex.test(firstName)) || (lastName && !nameRegex.test(lastName))) {
        errors.push('Only Alphabets allowed in name.');
        valid = false;
      }
      // Email validation
      if (email && !emailRegex.test(email)) {
        errors.push('Invalid Email Format');
        valid = false;
      }
      // Phone validation
      if (phone && !phoneRegex.test(phone)) {
        errors.push('Phone number must contain numbers and special characters only.');
        valid = false;
      }
      if (!valid) {
        e.preventDefault();
        formErrors.innerHTML = errors.map(e => `<div>${e}</div>`).join('');
        formErrors.style.display = 'block';
        window.formErrorsTimeout = setTimeout(() => {
          formErrors.style.display = 'none';
        }, 5000);
      } else {
        e.preventDefault();
        formSuccess.textContent = 'Submitted successfully!';
        formSuccess.style.display = 'block';
        setTimeout(() => {
          formSuccess.style.display = 'none';
        }, 5000);
        this.reset();
        // Optionally, clear stars selection
        selectedRating = 0;
        highlightStars(selectedRating);
        ratingInput.value = '';
      }
      // Simple client-side sanitization
      const fields = ['first_name', 'last_name', 'subject', 'message'];
      for (let field of fields) {
        let input = this.elements[field];
        if (input) {
          input.value = input.value.replace(/</g, "&lt;").replace(/>/g, "&gt;");
        }
      }
    });

    // Newsletter subscribe validation
    document.getElementById('newsletterBtn').addEventListener('click', function(e) {
      e.preventDefault();
      const email = document.getElementById('newsletterEmail').value.trim();
      const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      const errorDiv = document.getElementById('newsletterError');
      const successDiv = document.getElementById('newsletterSuccess');
      errorDiv.style.display = 'none';
      errorDiv.innerHTML = '';
      successDiv.style.display = 'none';
      successDiv.innerHTML = '';
      if (window.newsletterTimeout) clearTimeout(window.newsletterTimeout);
      if (!emailRegex.test(email)) {
        errorDiv.textContent = 'Invalid Email Format';
        errorDiv.style.display = 'block';
        window.newsletterTimeout = setTimeout(() => {
          errorDiv.style.display = 'none';
        }, 5000);
      } else {
        successDiv.textContent = 'Subscribed successfully!';
        successDiv.style.display = 'block';
        window.newsletterTimeout = setTimeout(() => {
          successDiv.style.display = 'none';
        }, 5000);
        document.getElementById('newsletterEmail').value = '';
      }
    });
  </script>
</body>

</html>