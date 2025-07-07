<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bright Minds - Science</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>

        <!-- 🔷 HEADER -->
  <header class="banner">
  <!-- Logo on the left -->
  <div class="logo-area">
    <img src="{{ asset('images/logo.png') }}" alt="Bright Mind Logo" class="logo" />
  </div>

<!-- Icons in the center -->
  <nav class="nav-icons">
    <div class="icon-item active" data-page="index">
      <div class="icon-box">
        <img src="{{ asset('images/home.png') }}" alt="Home" />
      </div>
      <span class="label">Home</span>
    </div>
    <div class="icon-item" data-page="learning">
      <div class="icon-box">
        <img src="{{ asset('images/learning.png') }}" alt="Learning" />
      </div>
      <span class="label">Learning</span>
    </div>
    <div class="icon-item" data-page="teachers">
      <div class="icon-box">
        <img src="{{ asset('images/teachers.png') }}" alt="Teachers" />
      </div>
      <span class="label">Teachers</span>
    </div>
    <div class="icon-item" data-page="blogs">
      <div class="icon-box">
        <img src="{{ asset('images/blogs.png') }}" alt="Blog" />
      </div>
      <span class="label">Blog</span>
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

  <main>
    <h1 style="font-size: 36px; text-align: center; color: #8e24aa; margin-bottom: 30px;">🔬 Welcome to the Science
      Page!</h1>

    <!-- Fun Facts Section -->
    <section class="fun-facts">
      <h2>🧠 Did You Know?</h2>
      <ul>
        <li>A day on Venus is longer than a year on Venus! 😲</li>
        <li>Octopuses have three hearts. ❤️❤️❤️</li>
        <li>Bananas are a little bit radioactive! 🍌⚛️</li>
      </ul>
    </section>

    <!-- Experiment Section -->
    <section class="experiments">
      <h2>🧪 Try This at Home!</h2>
      <div class="experiment-card">
        <h3>Make a Lava Lamp</h3>
        <p><strong>You’ll need:</strong> a bottle, oil, water, food coloring, and a fizzy tablet.</p>
        <p><strong>Instructions:</strong> Fill the bottle with oil and water, add a few drops of food coloring, then
          drop in a fizzy tablet. Watch the magic!</p>
      </div>
    </section>

    <!-- Topics Section -->
    <section class="topics">
      <h2>🔍 Explore Topics</h2>
      <div class="topic-grid">
        <div class="topic-card">
          <a href="https://en.wikipedia.org/wiki/Outer_space" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('images/outer-space.webp') }}" alt="Space" />
          </a>
          <p>Outer Space</p>
        </div>
        <div class="topic-card">
          <a href="https://en.wikipedia.org/wiki/Animal" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('images/animals.webp') }}" alt="Animals" />
          </a>
          <p>Animals</p>
        </div>
        <div class="topic-card">
          <a href="https://en.wikipedia.org/wiki/Plant" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('images/plants.jpg') }}" alt="Plants" />
          </a>
          <p>Plants</p>
        </div>
        <div class="topic-card">
          <a href="https://en.wikipedia.org/wiki/Invention" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('images/cool-inventions.avif') }}" alt="Inventions" />
          </a>
          <p>Cool Inventions</p>
        </div>
      </div>
    </section>

    <!-- Video Section -->
    <section class="videos">
      <h2>🎥 Watch & Learn</h2>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/HhTm4k_TLFI?si=SHSNzBMfmhHyrpxH"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </section>

    <!-- Quiz Section -->
    <section class="quiz">
      <h2>🧩 Science Riddle</h2>
      <p>I’m not alive, but I grow. I don’t have lungs, but I need air. What am I?</p>
      <button onclick="alert('Answer: Fire! 🔥')">Show Answer</button>
    </section>
  </main>

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
        <input type="email" placeholder="Your Email">
        <button>Subscribe</button>
      </div>

      <div id="newsletterError" style="display:none;position:fixed;top:90px;left:50%;transform:translateX(-50%);background:#fff3f3;color:#d8000c;border:1px solid #d8000c;padding:16px 32px;z-index:9999;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.15);font-size:16px;min-width:300px;max-width:90%;text-align:left;" role="alert"></div>
      <div id="newsletterSuccess" style="display:none;position:fixed;top:90px;left:50%;transform:translateX(-50%);background:#e6ffed;color:#207d3a;border:1px solid #207d3a;padding:16px 32px;z-index:9999;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.15);font-size:16px;min-width:300px;max-width:90%;text-align:left;" role="alert"></div>



      <div class="footer-links">
        <a href="#">Careers</a> |
        <a href="#">Privacy Policy</a> |
        <a href="#">Terms & Conditions</a>
      </div>
      <p class="copyright">© 2025 AURAK & RIT STUDENTS</p>
    </div>
  </footer>

    <script src="{{ asset('js/script.js') }}"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const subscribeBtn = document.querySelector('.newsletter button');
    const emailInput = document.querySelector('.newsletter input[type="email"]');
    const errorDiv = document.getElementById('newsletterError');
    const successDiv = document.getElementById('newsletterSuccess');

    subscribeBtn.addEventListener('click', function (e) {
      e.preventDefault();
      const email = emailInput.value.trim();
      const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

      errorDiv.style.display = 'none';
      errorDiv.innerHTML = '';
      successDiv.style.display = 'none';
      successDiv.innerHTML = '';

      if (window.newsletterTimeout) clearTimeout(window.newsletterTimeout);

      if (!email) {
        errorDiv.textContent = 'Field is Empty';
        errorDiv.style.display = 'block';
        window.newsletterTimeout = setTimeout(() => {
          errorDiv.style.display = 'none';
        }, 5000);
      } else if (!emailRegex.test(email)) {
        errorDiv.textContent = 'Invalid Email Format';
        errorDiv.style.display = 'block';
        window.newsletterTimeout = setTimeout(() => {
          errorDiv.style.display = 'none';
        }, 5000);
      } else {
        successDiv.textContent = 'Subscribed Successfully!';
        successDiv.style.display = 'block';
        emailInput.value = '';
        window.newsletterTimeout = setTimeout(() => {
          successDiv.style.display = 'none';
        }, 5000);
      }
    });
  });
</script>


  
</body>
</html>