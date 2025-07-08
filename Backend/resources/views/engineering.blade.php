<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bright Minds - Science</title>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Patrick Hand', cursive;
            background-color: #fff;
            color: #333;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 6px 30px;
            background: linear-gradient(to right, #e6d5ff, #c8a5ff);
            position: relative;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-img {
            width: 120px;
            height: auto;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            position: relative;
        }

        .nav-center {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .nav-icons {
            display: flex;
            gap: 30px;
            list-style: none;
        }

        .nav-icons li {
            text-align: center;
            font-size: 14px;
        }

        .icon-box img {
            width: 60px;
            height: 60px;
            background-color: white;
            border-radius: 20px;
            padding: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            display: block;
            margin: auto;
        }

        .language-auth {
            display: flex;
            gap: 10px;
            align-items: center;
            position: absolute;
            right: 30px;
        }

        .language-buttons button {
            padding: 6px 10px;
            border: 1px solid #000;
            background: white;
            color: black;
            cursor: pointer;
            font-size: 13px;
        }

        .language-buttons .active {
            background: black;
            color: white;
        }

        .auth-buttons a,
        .auth-buttons .login {
            text-decoration: none;
            padding: 6px 12px;
            background: #000;
            color: white;
            border: none;
            font-size: 13px;
            cursor: pointer;
            border-radius: 6px;
        }

        main {
            padding: 30px;
            max-width: 900px;
            margin: auto;
        }

        h2 {
            font-size: 28px;
            color: #6a1b9a;
            margin-bottom: 15px;
        }

        section {
            margin-bottom: 40px;
            background-color: #f0e5ff;
            padding: 20px;
            border-radius: 16px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        ul {
            list-style: inside;
            font-size: 18px;
        }

        .experiment-card,
        .topic-grid,
        .quiz {
            font-size: 18px;
        }

        .experiment-card h3 {
            font-size: 20px;
            color: #8e24aa;
            margin-bottom: 5px;
        }

        .topic-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 25px;
            justify-items: center;
            padding: 10px 0;
        }

        .topic-card {
            width: 140px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .topic-card:hover {
            transform: translateY(-6px);
        }

        .topic-card a {
            display: block;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        .topic-card a:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            transform: scale(1.05);
        }

        .topic-card img {
            width: 130px;
            height: 130px;
            margin-bottom: 8px;
            background: white;
            border-radius: 45%;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            object-fit: cover;
        }

        iframe {
            width: 100%;
            height: 315px;
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        button {
            background-color: #8e24aa;
            color: white;
            border: none;
            padding: 10px 16px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #6a1b9a;
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

    <main>
        <h1 style="font-size: 36px; text-align: center; color: #8e24aa; margin-bottom: 30px;">🧑‍🔬 Welcome to the
            Engineering Page!</h1>

        <section class="fun-facts">
            <h2>🔧 Did You Know?</h2>
            <ul>
                <li>The Eiffel Tower can grow up to 6 inches in summer due to heat! 🌡️🏗️</li>
                <li>Engineers invented roller coasters to distract people from immoral thoughts! 🎢</li>
                <li>Bridges can "sing" in the wind. 🌉🎶</li>
            </ul>
        </section>

        <section class="experiments">
            <h2>⚙️ Try This Build</h2>
            <div class="experiment-card">
                <h3>Build a Marshmallow Bridge</h3>
                <p><strong>You’ll need:</strong> marshmallows and toothpicks.</p>
                <p><strong>Instructions:</strong> Build the strongest bridge you can using only these materials. Test
                    how much weight it can hold!</p>
            </div>
        </section>

        <section class="topics">
            <h2>🏗️ Explore Engineering Fields</h2>
            <div class="topic-grid">
                <div class="topic-card">
                    <a href="https://en.wikipedia.org/wiki/Civil_engineering" target="_blank">
                        <img src="{{ asset('images/civil-eng.avif') }}" alt="Civil">
                    </a>
                    <p>Civil</p>
                </div>
                <div class="topic-card">
                    <a href="https://en.wikipedia.org/wiki/Mechanical_engineering" target="_blank">
                        <img src="{{ asset('images/mechanical-eng.jpeg') }}" alt="Mechanical">
                    </a>
                    <p>Mechanical</p>
                </div>
                <div class="topic-card">
                    <a href="https://en.wikipedia.org/wiki/Electrical_engineering" target="_blank">
                        <img src="{{ asset('images/electrical-eng.jpg') }}" alt="Electrical">
                    </a>
                    <p>Electrical</p>
                </div>
                <div class="topic-card">
                    <a href="https://en.wikipedia.org/wiki/Software_engineering" target="_blank">
                        <img src="{{ asset('images/software-eng.avif') }}" alt="Software">
                    </a>
                    <p>Software</p>
                </div>
            </div>
        </section>

        <section class="videos">
            <h2>🎥 Watch & Learn</h2>
            <iframe src="https://www.youtube.com/embed/owHF9iLyxic?si=NijLX-jtMDuawx_C"
                title="YouTube video player" allowfullscreen></iframe>
        </section>

        <section class="quiz">
            <h2>🔩 Engineering Riddle</h2>
            <p>I connect things together but am not glue. I can turn, but I’m not a wheel. What am I?</p>
            <button onclick="alert('Answer: A screw! 🔩')">Show Answer</button>
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
                <input type="email" id="newsletterEmail" placeholder="Your Email">
                <button id="newsletterBtn">Subscribe</button>
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

    <script>
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
            window.newsletterTimeout = setTimeout(() => {
                successDiv.style.display = 'none';
            }, 5000);
            document.getElementById('newsletterEmail').value = '';
        }
    });
    </script>
</body>

</html>
