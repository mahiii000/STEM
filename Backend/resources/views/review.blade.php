<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Write Your Review</title>
  <link rel="stylesheet" href="style2.css" />
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
  </style>
</head>

<body>
  <header>
    <div class="header-left">
      <img src="images/bright-mind-logo.png" alt="Bright Mind Logo" class="logo-img">
    </div>

    <nav class="navbar">
      <div class="nav-center">
        <ul class="nav-icons">
          <li>
            <div class="icon-box"><img src="images/home-icon.png" alt="Home"></div>
            <p>Home</p>
          </li>
          <li>
            <div class="icon-box"><img src="images/learning-icon.png" alt="Learning"></div>
            <p>Learning</p>
          </li>
          <li>
            <div class="icon-box"><img src="images/teaching-icon.png" alt="Teachers"></div>
            <p>Teachers</p>
          </li>
          <li>
            <div class="icon-box"><img src="images/blog-icon.png" alt="Blogs"></div>
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

    <!-- Stars Rating -->
    <div class="stars">
      <span class="star" data-value="1">&#9733;</span>
      <span class="star" data-value="2">&#9733;</span>
      <span class="star" data-value="3">&#9733;</span>
      <span class="star" data-value="4">&#9733;</span>
      <span class="star" data-value="5">&#9733;</span>
    </div>

    <form>
      <div class="half-width">
        <input type="text" placeholder="First name" required>
      </div>
      <div class="half-width">
        <input type="text" placeholder="Last name" required>
      </div>
      <div class="half-width">
        <input type="email" placeholder="Email" required>
      </div>
      <div class="half-width">
        <input type="tel" placeholder="Phone">
      </div>
      <div class="full-width">
        <input type="text" placeholder="Subject">
      </div>
      <div class="full-width">
        <textarea placeholder="Message" required></textarea>
      </div>
      <button type="submit">SUBMIT</button>
    </form>
  </div>
  <footer class="custom-footer">
    <div class="footer-left">
      <p>Follow Us</p>
      <div class="social-icons">
        <img src="images/x-logo.png" alt="X">
        <img src="images/ig-logo.png" alt="Instagram">
        <img src="images/yt-logo.png" alt="YouTube">
        <img src="images/linkedin-logo.png" alt="LinkedIn">
      </div>
    </div>

    <div class="footer-right">
      <h3>Subscribe to get our Newsletter</h3>
      <div class="newsletter">
        <input type="email" placeholder="Your Email">
        <button>Subscribe</button>
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
  </script>
</body>

</html>