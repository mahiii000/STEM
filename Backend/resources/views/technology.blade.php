<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bright Minds - Science</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}" />
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
        <h1 style="font-size: 36px; text-align: center; color: #8e24aa; margin-bottom: 30px;">⚙️ Welcome to the
            Technology Page!</h1>

        <section class="fun-facts">
            <h2>💡 Did You Know?</h2>
            <ul>
                <li>The first computer was the size of a room! 🖥️🏠</li>
                <li>There are more phones than people on Earth. 📱🌍</li>
                <li>Robots can now perform surgeries! 🤖🔬</li>
            </ul>
        </section>

        <section class="experiments">
            <h2>🔧 Try This Mini-Tech Project!</h2>
            <div class="experiment-card">
                <h3>Create a Paper Circuit</h3>
                <p><strong>You’ll need:</strong> LED light, copper tape, paper, and a coin battery.</p>
                <p><strong>Instructions:</strong> Stick copper tape in a simple path on paper, attach LED and battery,
                    and watch it glow!</p>
            </div>
        </section>


        <section class="topics">
            <h2>🌐 Explore Tech Topics</h2>
            <div class="topic-grid">
                <div class="topic-card">
                    <a href="https://en.wikipedia.org/wiki/Computer_programming" target="_blank"
                        rel="noopener noreferrer">
                        <img src="{{ asset('images/learn-to-code.jpeg') }}" alt="Coding" />
                    </a>
                    <p>Learn to Code</p>
                </div>
                <div class="topic-card">
                    <a href="https://en.wikipedia.org/wiki/Artificial_intelligence" target="_blank"
                        rel="noopener noreferrer">
                        <img src="{{ asset('images/ai.jpeg') }}" alt="AI" />
                    </a>
                    <p>Artificial Intelligence</p>
                </div>
                <div class="topic-card">
                    <a href="https://en.wikipedia.org/wiki/Robotics" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('images/robotics.webp') }}" alt="Robots" />
                    </a>
                    <p>Robotics</p>
                </div>
                <div class="topic-card">
                    <a href="https://en.wikipedia.org/wiki/Video_game_design" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('images/game-design.webp') }}" alt="Gaming" />
                    </a>
                    <p>Game Design</p>
                </div>
            </div>
        </section>


        <section class="videos">
            <h2>🎮 Watch & Learn</h2>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/aryKsus2BZo?si=d-rZ-oPjEF1e4t5G"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </section>

        <section class="quiz">
            <h2>🧠 Tech Riddle</h2>
            <p>I speak without a mouth and hear without ears. I have no body, but I come alive with code. What am I?</p>
            <button onclick="alert('Answer: A virtual assistant! 🤖')">Show Answer</button>
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
            <div class="footer-links">
                <a href="#">Careers</a> |
                <a href="#">Privacy Policy</a> |
                <a href="#">Terms & Conditions</a>
            </div>
            <p class="copyright">© 2025 AURAK & RIT STUDENTS</p>
        </div>
    </footer>

    <script src="{{ asset('js/main.js') }}"></script>


</body>
</html>